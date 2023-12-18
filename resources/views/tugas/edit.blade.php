@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Tugas</h2>
        @if (auth()->user()->role == 'dosen')
            <form action="/tugas/{{ $tugas->id }}/update" method="POST">
                @csrf
                <div class="form-group">
                    <label for="matkul">Mata Kuliah:</label>
                    <input type="text" class="form-control" id="matkul" name="matkul" value="{{ $tugas->matkul }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <input type="text" class="form-control" id="semester" name="semester" value="{{ $tugas->semester }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="pertemuan">Pertemuan:</label>
                    <input type="text" class="form-control" id="pertemuan" name="pertemuan"
                        value="{{ $tugas->pertemuan }}" required>
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai:</label>
                    <input type="number" class="form-control" id="nilai" name="nilai" value="{{ old('nilai') }}">
                </div>
                <div class="form-group">
                    <label for="tgl_buat">Tanggal Pembuatan:</label>
                    <input type="date" class="form-control" id="tgl_buat" name="tgl_buat" value="{{ $tugas->tgl_buat }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="tgl_deadline">Tanggal Deadline:</label>
                    <input type="date" class="form-control" id="tgl_deadline" name="tgl_deadline"
                        value="{{ $tugas->tgl_deadline }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        @else
        @endif
        @if (auth()->user()->role == 'mahasiswa')
            <form action="/tugas/{{ $tugas->id }}/pengumpulan" method="POST">
                @csrf
                <div class="form-group">
                    <label for="link">Link Tugas:</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        @elseif (auth()->user()->role == 'dosen')
            <form action="/tugas/{{ $tugas->id }}/pengumpulan" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nilai">Nilai Tugas:</label>
                    <input type="text" class="form-control" id="nilai" name="nilai" value="{{ old('nilai') }}">
                </div>
            </form>
        @endif
    </div>
@endsection
