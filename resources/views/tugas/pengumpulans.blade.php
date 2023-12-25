<!-- Pada file index_dosen.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Data Pengumpulan Dosen</h2>

    <table class="table-hover table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mahasiswa</th>
                {{-- <th>Matakuliah</th> --}}
                <th>Tanggal Pengumpulan</th>
                <th>Link Tugas</th>
                <th>Nilai</th>
                <th>Komentar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumpulans as $pengumpulan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengumpulan->mahasiswa->nama }}</td>
                    {{-- <td>{{ $pengumpulan->tugas->matkul }}</td> --}}
                    <td>{{ $pengumpulan->tgl_pengumpulan }}</td>
                    <td>{{ $pengumpulan->link_tugas }}</td>
                    <td>{{ $pengumpulan->nilai }}</td>
                    <td>{{ $pengumpulan->komentar }}</td>
                    <td>
                        <a href="{{ route('pengumpulan.edit', $pengumpulan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>  
@endsection
