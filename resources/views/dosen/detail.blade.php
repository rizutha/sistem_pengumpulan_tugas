@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Dosen</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">NIP: {{ $dosen->nip }}</h5>
                <p class="card-text">Nama: {{ $dosen->nama }}</p>
                <p class="card-text">Tanggal Lahir: {{ $dosen->tgl_lahir }}</p>
                <p class="card-text">Alamat: {{ $dosen->alamat }}</p>
                <p class="card-text">Kontak: {{ $dosen->kontak }}</p>
                <p class="card-text">Email: {{ $dosen->email }}</p>
                <p class="card-text">Dosen Matkul: {{ $dosen->dosen_matkul }}</p>
                @if ($dosen->foto)
                    <img src="{{ asset('storage/dosen/' . $dosen->foto) }}" style="width:250px" class="rounded-3" />
                @endif
            </div>
        </div>

        <a href="{{ route('dosen.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
