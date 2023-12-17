@extends('layouts.app')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="row">
            <div class="row mb-3 text-center">
                <h1>Selamat Datang!</h1>
            </div>
            <div class="row">
                <div class="text-center">
                    <a href="/mahasiswa" class="btn btn-primary btn-lg" style="width: 300px">Lihat Data Mahasiswa</a>
                </div>
                <div class="mt-2 text-center">
                    <a href="/dosen" class="btn btn-primary btn-lg" style="width: 300px">Lihat Data Dosen</a>
                </div>
                <div class="mt-2 text-center">
                    <a href="/tugas" class="btn btn-primary btn-lg" style="width: 300px">Lihat Tugas</a>
                </div>
            </div>
        </div>
    </div>
@endsection
