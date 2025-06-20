@extends('layouts.app')

@section('title', 'Edit obat')

@section('content')
<form action="{{ route('obat.update', $obat['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Nama Obat</label>
        <input type="text" name="nama_obat" value="{{ $obat['nama_obat'] }}" class="form-control">
    </div>
    <div class="mb-2">
        <label>kategori</label>
        <input type="text" name="kategori" value="{{ $obat['kategori'] }}" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>stok</label>
        <input type="text" name="stok" value="{{ $obat['stok'] }}" class="form-control">
    </div>
    <div class="mb-2">
  <label>Harga</label>
    <input type="text" name="harga" value="{{ $obat['harga'] }}" class="form-control" required>
</div>
<button class="btn btn-primary">Update</button>
</form> @endsection 