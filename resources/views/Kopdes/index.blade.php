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
                        <th>Foto Kopdes</th>
                        <th>Nama Kopdes</th>
                        <th>Alamat Kopdes</th>
                        <th>Tanggal Berdiri</th>
                        <th>Foto Manager</th>
                        <th>Nama Manager</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kopdes as $item)
                        <tr>
                            <td>
                               @if ($item->foto_kopdes)
                                <img
                                    src="{{ asset('storage/' . $item->foto_kopdes) }}"
                                    alt="{{ $item->nama_kopdes }}"
                                    class="rectangle-image"
                                    style="width: 160px; height: 90px; object-fit: cover; border-radius: 6px;"
                                    >
                                @else
                                    <div class="no-image">
                                        Tidak ada foto
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->nama_kopdes }}</td>
                            <td>{{ $item->alamat_kopdes }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tgl_berdiri)->format('d-m-Y') }}</td>
                            <td>
                                @if ($item->manager && $item->manager->foto_manager)
                                    <img
                                        src="{{ asset('storage/' . $item->manager->foto_manager) }}"
                                        alt="{{ $item->manager->nama_manager }}"
                                        class="club-image"
                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                                @else
                                    <div class="no-image">
                                        Tidak ada foto
                                     </div>
                                @endif
                            </td>
                            <td> @if ($item->manager) {{ $item->manager->nama_manager }} @else Tidak ada manager @endif </td>
                            <td class="text-center">
                                <a href="{{ route('kopdes.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('kopdes.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kopdes ini?');">
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
                            <td colspan="7" class="text-center text-muted">Tidak ada data kopdes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection