@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Dosen</h2>

        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="kontak">Kontak:</label>
                <input type="text" class="form-control" id="kontak" name="kontak" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="dosen_matkul">Dosen Matkul:</label>
                <input type="text" class="form-control" id="dosen_matkul" name="dosen_matkul" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
