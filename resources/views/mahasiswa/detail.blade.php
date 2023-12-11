@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Mahasiswa</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">NIM: {{ $mahasiswa->nim }}</h5>
                <p class="card-text">Nama: {{ $mahasiswa->nama }}</p>
                <p class="card-text">Alamat: {{ $mahasiswa->alamat }}</p>
                <p class="card-text">Tanggal Lahir: {{ $mahasiswa->tgl_lahir }}</p>
                <p class="card-text">Kontak: {{ $mahasiswa->kontak }}</p>
                <p class="card-text">Email: {{ $mahasiswa->email }}</p>
                <p class="card-text">Prodi: {{ $mahasiswa->prodi }}</p>
                <p class="card-text">Semester: {{ $mahasiswa->semester }}</p>
                <p class="card-text">Foto: {{ asset('storage/images/mahasiswa' . $mahasiswa->foto) }}</p>
            </div>
        </div>

        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
