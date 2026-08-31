@extends('layouts.app')

@section('title', 'Daftar Manager')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-people me-2"></i>Daftar Data Manager</h5>
        <a href="{{ route('manager.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Manager
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Pendidikan Terakhir</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($managers as $index => $m)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td>
                            <span class="badge bg-secondary-subtle text-dark border">{{ $m->nip }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center" style="width:34px; height:34px; font-size:13px; font-weight:bold;">
                                    {{ strtoupper(substr($m->nama_manager, 0, 1)) }}
                                </div>
                                <span class="fw-semibold">{{ $m->nama_manager }}</span>
                            </div>
                        </td>
                        <td>{{ $m->tanggal_lahir }}</td>
                        <td>
                            @if($m->jenis_kelamin == 'Pria')
                                <span class="badge bg-primary-subtle text-primary"><i class="bi bi-gender-male me-1"></i>Pria</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger"><i class="bi bi-gender-female me-1"></i>Wanita</span>
                            @endif
                        </td>
                        <td><span class="badge bg-info-subtle text-info-emphasis">{{ $m->pendidikan_terakhir }}</span></td>
                        <td class="text-muted small" style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                            {{ $m->alamat }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('manager.edit', $m->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('manager.destroy', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data manager ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-3 d-block mb-2 text-secondary"></i>
                            Belum ada data manager.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection