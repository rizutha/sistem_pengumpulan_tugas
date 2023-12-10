@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Tugas</h2>

        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="matkul">Mata Kuliah:</label>
                <input type="text" class="form-control" id="matkul" name="matkul" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="text" class="form-control" id="semester" name="semester" required>
            </div>
            <div class="form-group">
                <label for="pertemuan">Pertemuan:</label>
                <input type="text" class="form-control" id="pertemuan" name="pertemuan" required>
            </div>
            <div class="form-group">
                <label for="link_tugas">Link Tugas:</label>
                <input type="text" class="form-control" id="link_tugas" name="link_tugas">
            </div>
            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="number" class="form-control" id="nilai" name="nilai">
            </div>
            <div class="form-group">
                <label for="tgl_buat">Tanggal Pembuatan:</label>
                <input type="date" class="form-control" id="tgl_buat" name="tgl_buat" required>
            </div>
            <div class="form-group">
                <label for="tgl_deadline">Tanggal Deadline:</label>
                <input type="date" class="form-control" id="tgl_deadline" name="tgl_deadline" required>
            </div>
            <div class="form-group">
                <label for="tgl_pengumpulan">Tanggal Pengumpulan:</label>
                <input type="date" class="form-control" id="tgl_pengumpulan" name="tgl_pengumpulan">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
