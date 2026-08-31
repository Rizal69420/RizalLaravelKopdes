@extends('layouts.app')

@section('title', 'Detail Mata Pelajaran')

@section('content')
<div class="container">
    <h1>Detail Mata Pelajaran</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $mapel->nama_mapel }}</h5>
            <p class="card-text">
                <strong>Kode:</strong> {{ $mapel->kode_mapel }}<br>
                <strong>Jam Pelajaran:</strong> {{ $mapel->jam_pelajaran }}<br>
                <strong>Guru Pengampu:</strong> {{ $mapel->guru ? $mapel->guru->nama_guru : 'Belum Ditentukan' }}
            </p>
            <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
