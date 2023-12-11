@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Mahasiswa</h2>

        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}" required>
            </div>
            <div class="form-group">
                <label for="kontak">Kontak:</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $mahasiswa->kontak }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" required>
            </div>
            <div class="form-group">
                <label for="prodi">Prodi:</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $mahasiswa->prodi }}" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="text" class="form-control" id="semester" name="semester" value="{{ $mahasiswa->semester }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
