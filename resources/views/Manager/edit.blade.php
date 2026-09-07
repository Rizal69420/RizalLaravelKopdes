@extends('layouts.app')

@section('title', 'Edit Manager')

@section('content')
<div class="row justify-content-creator">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Manager</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('manager.update', $manager->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Foto Manager --}}
                    <div class="mb-3">
                        <label for="foto_manager" class="form-label">Foto Manager</label>
                        <input type="file" class="form-control @error('foto_manager') is-invalid @enderror" 
                            id="foto_manager" name="foto_manager" accept="image/*">
                        @error('foto_manager')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($manager->foto_manager)
                            <div class="mt-2" id="fotoManagerPreview">
                                <img src="{{ asset('storage/' . $manager->foto_manager) }}" alt="Preview Foto Manager" id="previewManagerImage" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                                <button type="button" class="btn btn-danger btn-sm mt-2" id="removeManagerImage">Hapus Foto</button>
                            </div>
                        @else
                            <div class="mt-2" id="fotoManagerPreview" style="display: none;">
                                <img src="#" alt="Preview Foto Manager" id="previewManagerImage" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                                <button type="button" class="btn btn-danger btn-sm mt-2" id="removeManagerImage">Hapus Foto</button>
                            </div>
                        @endif
                    </div>
                    {{-- Nama Manager --}}
                    <div class="mb-3">
                        <label for="nama_manager" class="form-label">Nama Manager</label>
                        <input type="text" class="form-control @error('nama_manager') is-invalid @enderror" id="nama_manager" name="nama_manager" value="{{ old('nama_manager', $manager->nama_manager) }}">
                        @error('nama_manager')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Tanggal Lahir --}}
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $manager->tanggal_lahir) }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Jenis Kelamin --}}
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Pria" {{ old('jenis_kelamin', $manager->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ old('jenis_kelamin', $manager->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Alamat Manager --}}
                    <div class="mb-3">
                        <label for="alamat_manager" class="form-label">Alamat Manager</label>
                        <textarea class="form-control @error('alamat_manager') is-invalid @enderror" id="alamat_manager" name="alamat_manager" rows="3">{{ old('alamat_manager', $manager->alamat_manager) }}</textarea>
                        @error('alamat_manager')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Pendidikan Terakhir --}}
                    <div class="mb-3">
                        <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $manager->pendidikan_terakhir) }}">
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('manager.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function setupImagePreview(inputId, containerId, imageId, removeButtonId) {
            const input = document.getElementById(inputId);
            const container = document.getElementById(containerId);
            const image = document.getElementById(imageId);
            const removeButton = document.getElementById(removeButtonId);

            if (!input || !container || !image || !removeButton) return;

            input.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    image.src = URL.createObjectURL(file);
                    container.style.display = 'block';
                } else {
                    resetPreview();
                }
            });

            removeButton.addEventListener('click', function () {
                resetPreview();
            });

            function resetPreview() {
                input.value = '';
                image.src = '#';
                container.style.display = 'none';
            }
        }

        setupImagePreview('foto_kopdes', 'fotoPreview', 'previewImage', 'removeImage');
        setupImagePreview('foto_manager', 'fotoManagerPreview', 'previewManagerImage', 'removeManagerImage');
    });
</script>
@endsection