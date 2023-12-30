@extends('layouts.app')

@section('content')
    <div class="bg-light rounded-2 container p-5 shadow-lg">
        <h2>Detail Dosen</h2>

        <div class="row">
            @if ($dosen->foto)
                <img src="{{ asset('storage/dosen/' . $dosen->foto) }}" style="width:250px" class="rounded-3 col-auto" />
            @endif
            <div class="col-auto">
                <div class="row">
                    <h4>{{ $dosen->user->name }}</h4>
                    <p class="fw-bold">NIP: {{ $dosen->nip }}</p>
                </div>
                <p class="card-text">Tanggal Lahir: {{ $dosen->tgl_lahir }}</p>
                <p class="card-text">Alamat: {{ $dosen->alamat }}</p>
                <p class="card-text">Kontak: {{ $dosen->kontak }}</p>
                <p class="card-text">Email: {{ $dosen->email }}</p>
                <p class="card-text">Dosen Matkul: {{ $dosen->keilmuan }}</p>
            </div>
        </div>
    </div>
@endsection
