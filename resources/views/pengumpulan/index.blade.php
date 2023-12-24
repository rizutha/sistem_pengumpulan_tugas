<!-- resources/views/pengumpulan/index_dosen.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Pengumpulan Tugas</h2>

        <!-- Tampilkan daftar pengumpulan untuk dosen -->
        <table class="table-hover table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mahasiswa</th>
                    <th>Tugas</th>
                    <th>Link Tugas</th>
                    <th>Nilai</th>
                    <th>Komentar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengumpulans as $pengumpulan)
                    <tr>
                        <td>{{ $pengumpulan->id }}</td>
                        <td>{{ $pengumpulan->mahasiswa->nama }}</td>
                        <td>{{ $pengumpulan->tugas->matkul }}</td>
                        <td>{{ $pengumpulan->link_tugas }}</td>
                        <td>{{ $pengumpulan->nilai }}</td>
                        <td>{{ $pengumpulan->komentar }}</td>
                        <td>
                            <a href="{{ route('pengumpulan.edit', $pengumpulan->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
@endsection
