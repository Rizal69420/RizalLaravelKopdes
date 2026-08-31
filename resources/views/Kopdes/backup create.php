@extends('layouts.app')

@section('title', 'Tambah Data Kopdes')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data Kopdes</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('kopdes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Kopdes <span class="text-danger">*</span></label>
                        <input type="file"
                               name="foto_kopdes"
                               class="form-control @error('foto_kopdes') is-invalid @enderror"
                               accept="image/*"
                               required>
                        @error('foto_kopdes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <div id="fotoPreview" class="mt-3">
                        <img id="previewImage" src="#" alt="Preview Foto Kopdes" class="img-fluid rounded" style="max-height: 200px;">
                        <div class="mt-2">
                            <button type="button" id="removeImage" class="btn btn-danger btn-sm" style="display: none;">
                                <i class="bi bi-x-circle me-1"></i> Hapus Foto
                            </button>
                    </div>


                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Kopdes <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="nama_kopdes" 
                               class="form-control @error('nama_kopdes') is-invalid @enderror" 
                               value="{{ old('nama_kopdes') }}" 
                               placeholder="Masukkan nama kopdes" 
                               required>
                        @error('nama_kopdes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat Kopdes <span class="text-danger">*</span></label>
                        <textarea name="alamat_kopdes" 
                                  class="form-control @error('alamat_kopdes') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Masukkan alamat kopdes" 
                                  required>{{ old('alamat_kopdes') }}</textarea>
                        @error('alamat_kopdes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Berdiri <span class="text-danger">*</span></label>
                        <input type="date" 
                               name="tgl_berdiri" 
                               class="form-control @error('tgl_berdiri') is-invalid @enderror" 
                               value="{{ old('tgl_berdiri') }}" 
                               required>
                        @error('tgl_berdiri')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Manager <span class="text-danger">*</span></label>
                        <select name="manager_id" class="form-select @error('manager_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Manager --</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}" {{ old('manager_id') == $manager->id ? 'selected' : '' }}>
                                    {{ $manager->nama_manager }} (NIP: {{ $manager->nip }})
                                </option>
                            @endforeach
                        </select>
                        @error('manager_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Manager <span class="text-danger">*</span></label>
                        <input type="file"
                               name="foto_manager"
                               id="foto_manager"
                               class="form-control @error('foto_manager') is-invalid @enderror"
                               accept="image/*"
                               required>
                        @error('foto_manager')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div id="fotoManagerPreview" class="mb-3">
                        <img id="previewManagerImage" src="#" alt="Preview Foto Manager" class="img-fluid rounded" style="max-height: 200px;">
                        <div class="mt-2">
                            <button type="button" id="removeManagerImage" class="btn btn-danger btn-sm" style="display: none;">
                                <i class="bi bi-x-circle me-1"></i> Hapus Foto Manager
                            </button>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('kopdes.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function setupImagePreview(inputId, previewId, removeButtonId) {
            const input = document.getElementById(inputId);
            const container = document.getElementById(previewId);
            const image = document.getElementById(ImageId);
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

        setupImagePreview('foto_kopdes', 'fotoPreview', 'removeImage');
        setupImagePreview('foto_manager', 'fotoManagerPreview', 'removeManagerImage');
    });
</script>
@endsection