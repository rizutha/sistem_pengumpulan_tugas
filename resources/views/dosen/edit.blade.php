@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Dosen</h2>

        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosen->nip }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosen->nama }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $dosen->tgl_lahir }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $dosen->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="kontak">Kontak:</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $dosen->kontak }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}" required>
            </div>
            <div class="form-group">
                <label for="dosen_matkul">Dosen Matkul:</label>
                <input type="text" class="form-control" id="dosen_matkul" name="dosen_matkul" value="{{ $dosen->dosen_matkul }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
