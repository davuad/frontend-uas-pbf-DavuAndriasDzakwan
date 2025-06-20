@extends('layouts.app')

@section('title', 'Data Obat')

@section('content')
<a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">Tambah obat</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Obat</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($obat as $obt)
        <tr>
            <td>{{ $obt['nama_obat'] }}</td>
            <td>{{ $obt['kategori'] }}</td>
            <td>{{ $obt['stok'] }}</td>
            <td>{{ $obt['harga'] }}</td>
            <td>
                <a href="{{ route('obat.edit', $obt['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('obat.destroy', $obt['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
