@extends('layouts.app')

@section('title', 'Edit pasien')

@section('content')
<form action="{{ route('pasien.update', $pasien['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $pasien['nama'] }}" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>alamat</label>
        <input type="text" name="alamat" value="{{ $pasien['alamat'] }}" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ $pasien['tanggal_lahir'] }}" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L" {{ $pasien['jenis_kelamin'] == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ $pasien['jenis_kelamin'] == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
