@extends('layouts.app')

@section('title', 'Edit Data Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-warning"><i class="bi bi-pencil-square me-2"></i>Edit Data Guru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- NIP -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">NIP <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nip" 
                                   class="form-control @error('nip') is-invalid @enderror" 
                                   value="{{ old('nip', $guru->nip) }}" 
                                   maxlength="18" 
                                   required>
                            @error('nip')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Nama Guru -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_guru" 
                                   class="form-control @error('nama_guru') is-invalid @enderror" 
                                   value="{{ old('nama_guru', $guru->nama_guru) }}" 
                                   required>
                            @error('nama_guru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="Pria" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Pendidikan Terakhir -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="pendidikan_terakhir" 
                                   class="form-control @error('pendidikan_terakhir') is-invalid @enderror" 
                                   value="{{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) }}" 
                                   required>
                            @error('pendidikan_terakhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea name="alamat" 
                                  class="form-control @error('alamat') is-invalid @enderror" 
                                  rows="3" 
                                  required>{{ old('alamat', $guru->alamat) }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('guru.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-warning text-white px-4"><i class="bi bi-save me-1"></i> Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection