@extends('layouts.app')

@section('title', 'Tambah pasien')

@section('content')
<form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>alamat</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
         </select>
    </div>


    <button class="btn btn-success">Simpan</button>
</form>
@endsection
