@extends('layouts.app')

@section('title', 'Edit Kopdes')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Kopdes</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kopdes.update', $kopdes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Foto Kopdes --}}
                    <div class="mb-3">
                        <label for="foto_kopdes" class="form-label">Foto Kopdes</label>
                        <input type="file" class="form-control @error('foto_kopdes') is-invalid @enderror" id="foto_kopdes" name="foto_kopdes" accept="image/*" onchange="previewKopdesImage(event)">
                        @error('foto_kopdes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($kopdes->foto_kopdes)
                            <div class="mt-2" id="fotoKopdesPreview">
                                <img src="{{ asset('storage/' . $kopdes->foto_kopdes) }}" alt="Preview Foto Kopdes" id="previewKopdesImage" style="width: 160px; height: 90px; object-fit: cover; border-radius: 6px;">
                                <button type="button" class="btn btn-danger btn-sm mt-2" id="removeKopdesImage">Hapus Foto</button>
                            </div>
                        @else
                            <div class="mt-2" id="fotoKopdesPreview" style="display: none;">
                                <img src="#" alt="Preview Foto Kopdes" id="previewKopdesImage" style="width: 160px; height: 90px; object-fit: cover; border-radius: 6px;">
                                <button type="button" class="btn btn-danger btn-sm mt-2" id="removeKopdesImage">Hapus Foto</button>
                            </div>
                        @endif
                    </div>
                    {{-- Nama Kopdes --}}
                    <div class="mb-3">
                        <label for="nama_kopdes" class="form-label">Nama Kopdes</label>
                        <input type="text" class="form-control @error('nama_kopdes') is-invalid @enderror" id="nama_kopdes" name="nama_kopdes" value="{{ old('nama_kopdes', $kopdes->nama_kopdes) }}">
                        @error('nama_kopdes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Alamat Kopdes --}}
                    <div class="mb-3">
                        <label for="alamat_kopdes" class="form-label">Alamat Kopdes</label>
                        <textarea class="form-control @error('alamat_kopdes') is-invalid @enderror" id="alamat_kopdes" name="alamat_kopdes" rows="3">{{ old('alamat_kopdes', $kopdes->alamat_kopdes) }}</textarea>
                        @error('alamat_kopdes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Tanggal Berdiri --}}
                    <div class="mb-3">
                        <label for="tgl_berdiri" class="form-label">Tanggal Berdiri</label>
                        <input type="date" class="form-control @error('tgl_berdiri') is-invalid @enderror" id="tgl_berdiri" name="tgl_berdiri" value="{{ old('tgl_berdiri', $kopdes->tgl_berdiri) }}">
                        @error('tgl_berdiri')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Manager --}}
                    <div class="mb-3">
                        <label for="manager_id" class="form-label">Manager</label>
                        <select class="form-select @error('manager_id') is-invalid @enderror" id="manager_id" name="manager_id">
                            <option value="">Pilih Manager</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}" {{ old('manager_id', $kopdes->manager_id) == $manager->id ? 'selected' : '' }}>{{ $manager->nama_manager }}</option>
                            @endforeach
                        </select>
                        @error('manager_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('kopdes.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection