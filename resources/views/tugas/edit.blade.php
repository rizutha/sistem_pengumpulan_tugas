@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Tugas</h2>

        <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="matkul">Mata Kuliah:</label>
                <input type="text" class="form-control" id="matkul" name="matkul" value="{{ $tugas->matkul }}" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="text" class="form-control" id="semester" name="semester" value="{{ $tugas->semester }}" required>
            </div>
            <div class="form-group">
                <label for="pertemuan">Pertemuan:</label>
                <input type="text" class="form-control" id="pertemuan" name="pertemuan" value="{{ $tugas->pertemuan }}" required>
            </div>
            <div class="form-group">
                <label for="link_tugas">Link Tugas:</label>
                <input type="text" class="form-control" id="link_tugas" name="link_tugas" value="{{ $tugas->link_tugas }}">
            </div>
            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="number" class="form-control" id="nilai" name="nilai" value="{{ $tugas->nilai }}">
            </div>
            <div class="form-group">
                <label for="tgl_buat">Tanggal Pembuatan:</label>
                <input type="date" class="form-control" id="tgl_buat" name="tgl_buat" value="{{ $tugas->tgl_buat }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_deadline">Tanggal Deadline:</label>
                <input type="date" class="form-control" id="tgl_deadline" name="tgl_deadline" value="{{ $tugas->tgl_deadline }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_pengumpulan">Tanggal Pengumpulan:</label>
                <input type="date" class="form-control" id="tgl_pengumpulan" name="tgl_pengumpulan" value="{{ $tugas->tgl_pengumpulan }}">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
    </div>
@endsection
