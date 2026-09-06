@extends('layouts.app')

@section('title', 'Edit Data Manager')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-warning"><i class="bi bi-pencil-square me-2"></i>Edit Data Manager</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('manager.update', $manager->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Foto Manager -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Foto Manager <span class="text-danger">*</span></label>
                            <input type="file" 
                                   name="foto_manager" 
                                   class="form-control @error('foto_manager') is-invalid @enderror"
                                   value="{{ old('foto_manager', $manager->foto_manager) }}"
                                   accept="image/*">
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
                        </div>

                        <!-- Nama Manager -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_manager" 
                                   class="form-control @error('nama_manager') is-invalid @enderror" 
                                   value="{{ old('nama_manager', $manager->nama_manager) }}" 
                                   required>
                            @error('nama_manager')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Tanggal Lahir -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" 
                                   name="tanggal_lahir" 
                                   class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                   value="{{ old('tanggal_lahir', $manager->tanggal_lahir) }}" 
                                   required>
                            @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="Pria" {{ old('jenis_kelamin', $manager->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ old('jenis_kelamin', $manager->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Alamat -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" 
                                  class="form-control @error('alamat_manager') is-invalid @enderror" 
                                  rows="3" 
                                  required>{{ old('alamat_manager', $manager->alamat_manager) }}</textarea>
                            @error('alamat_manager')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                        <!-- Pendidikan Terakhir -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="pendidikan_terakhir" 
                                   class="form-control @error('pendidikan_terakhir') is-invalid @enderror" 
                                   value="{{ old('pendidikan_terakhir', $manager->pendidikan_terakhir) }}" 
                                   required>
                            @error('pendidikan_terakhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('manager.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-warning text-white px-4"><i class="bi bi-save me-1"></i> Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection