@extends('layouts.app')

@section('title', 'Edit Kopdes')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Kopdes</div>
            <div class="card-body">
                <form method="POST" action="{{ route('kopdes.update', $kopdes->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama Kopdes</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $kopdes->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $kopdes->address) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $kopdes->phone) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>