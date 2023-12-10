@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Tugas</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mata Kuliah: {{ $tugas->matkul }}</h5>
                <p class="card-text">Semester: {{ $tugas->semester }}</p>
                <p class="card-text">Pertemuan: {{ $tugas->pertemuan }}</p>
                <p class="card-text">Link Tugas: {{ $tugas->link_tugas }}</p>
                <p class="card-text">Nilai: {{ $tugas->nilai }}</p>
                <p class="card-text">Tanggal Pembuatan: {{ $tugas->tgl_buat }}</p>
                <p class="card-text">Tanggal Deadline: {{ $tugas->tgl_deadline }}</p>
                <p class="card-text">Tanggal Pengumpulan: {{ $tugas->tgl_pengumpulan }}</p>
            </div>
        </div>

        <a href="{{ route('tugas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
