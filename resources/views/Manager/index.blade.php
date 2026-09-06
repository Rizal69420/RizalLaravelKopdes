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
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Pendidikan Terakhir</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($managers as $manager)
                        <tr>
                            <td>
                                @if ($manager->foto_manager)
                                    <img
                                        src="{{ asset('storage/' . $manager->foto_manager) }}"
                                        alt="{{ $manager->nama_manager }}"
                                        class="club-image"
                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;"
                                        >
                                @else
                                    <div class="no-image">
                                        Tidak ada foto
                                    </div>
                                @endif
                            </td>
                            <td>{{ $manager->nama_manager }}</td>
                            <td>{{ \Carbon\Carbon::parse($manager->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $manager->jenis_kelamin }}</td>
                            <td>{{ $manager->alamat_manager }}</td>
                            <td>{{ $manager->pendidikan_terakhir }}</td>
                            <td class="text-center">
                                <a href="{{ route('manager.edit', $manager->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('manager.destroy', $manager->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus manager ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada data manager.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection