@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Mahasiswa</h2>

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
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
                <label for="prodi">Prodi:</label>
                <input type="text" class="form-control" id="prodi" name="prodi" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester <span class="text-danger">*</span></label>
                <select name="semester" class="form-control @if ($errors->has('semester')) is-invalid @endif">
                    <option value="" selected disabled>Pilih Semester</option>
                    <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                    <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                    <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>Semester 3</option>
                    <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>Semester 4</option>
                    <option value="5" {{ old('semester') == '5' ? 'selected' : '' }}>Semester 5</option>
                    <option value="6" {{ old('semester') == '6' ? 'selected' : '' }}>Semester 6</option>
                    <option value="7" {{ old('semester') == '7' ? 'selected' : '' }}>Semester 7</option>
                    <option value="8" {{ old('semester') == '8' ? 'selected' : '' }}>Semester 8</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
