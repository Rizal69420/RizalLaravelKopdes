@extends('layouts.app')

@section('title', 'Daftar Kopdes')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-book me-2"></i>Daftar Kopdes</h5>
        <a href="{{ route('kopdes.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kopdes
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Kode</th>
                        <th>Nama Kopdes</th>
                        <th>Alamat</th>
                        <th>Tanggal Berdiri</th>
                        <th>Manager</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kopdes as $index => $k)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td><span class="badge bg-secondary-subtle text-dark border">{{ $k->kode_kopdes }}</span></td>
                        <td class="fw-semibold">{{ $k->nama_kopdes }}</td>
                        <td>{{ $k->alamat_kopdes }}</td>
                        <td>{{ $k->tgl_berdiri }}</td>
                        <td>
                            @if($k->manager)
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center" style="width:32px; height:32px; font-size:12px;">
                                        {{ strtoupper(substr($k->manager->nama_manager, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $k->manager->nama_manager }}</div>
                                        <small class="text-muted">NIP: {{ $k->manager->nip }}</small>
                                    </div>
                                </div>
                            @else
                                <span class="badge bg-warning-subtle text-warning-emphasis">Belum Ditentukan</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('kopdes.edit', $k->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('kopdes.destroy', $k->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kopdes ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data kopdes.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection