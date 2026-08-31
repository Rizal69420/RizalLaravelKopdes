@extends('layouts.app')

@section('title', 'Tambah Data Manager')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data Manager</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('manager.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     {{-- Foto Manager --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Manager <span class="text-danger">*</span></label>
                        <input type="file"
                               name="foto_manager"
                               id="foto_manager"
                               class="form-control @error('foto_manager') is-invalid @enderror"
                               accept="image/*"
                               required>
                        @error('foto_manager')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        <div id="fotoManagerPreview" class="mt-3" style="display: none;">
                            <img id="previewManagerImage" src="#" alt="Preview Foto Manager" class="img-fluid rounded mb-2" style="max-height: 200px;">
                            <div>
                                <button type="button" id="removeManagerImage" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle me-1"></i> Hapus Foto Manager
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Nama Manager --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Manager <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="nama_manager" 
                               class="form-control @error('nama_manager') is-invalid @enderror" 
                               value="{{ old('nama_manager') }}" 
                               placeholder="Masukkan nama manager" 
                               required>
                        @error('nama_manager')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" 
                               name="tanggal_lahir" 
                               class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                               value="{{ old('tanggal_lahir') }}" 
                               required>
                        @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- jenis Kelamin --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Alamat Manager --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat Manager <span class="text-danger">*</span></label>
                        <textarea name="alamat_manager" 
                                  class="form-control @error('alamat_manager') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Masukkan alamat manager" 
                                  required>{{ old('alamat_manager') }}</textarea>
                        @error('alamat_manager')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Pendidikan Terakhir --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pendidikan Terakhir <span class="text -danger">*</span></label>
                        <input type="text"
                               name="pendidikan_terakhir"
                               class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                               value="{{ old('pendidikan_terakhir') }}"
                               placeholder="Masukkan pendidikan terakhir"
                               required>
                        @error('pendidikan_terakhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('manager.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
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