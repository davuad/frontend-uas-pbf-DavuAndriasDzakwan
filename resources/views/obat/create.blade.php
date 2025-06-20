@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<form action="{{ route('obat.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nama Obat</label>
        <input type="text" name="nama_obat" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>kategori</label>
        <input type="text" name="kategori" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>stok</label>
        <input type="texr" name="stok" class="form-control">
    </div>
    <div class="mb-2">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
