@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
<a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah pasien</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasien as $pasiens)
        <tr>
            <td>{{ $pasiens['nama'] }}</td>
            <td>{{ $pasiens['alamat'] }}</td>
            <td>{{ $pasiens['tanggal_lahir'] }}</td>
            <td>{{ $pasiens['jenis_kelamin'] }}</td>
            <td>
                <a href="{{ route('pasien.edit', $pasiens['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pasien.destroy', $pasiens['id']) }}" method="POST" style="display:inline;">
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
