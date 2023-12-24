<!-- show_mahasiswa.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($query as $mahasiswa)
                    <tr>
                        
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->alamat }}</td>
                        <td>{{ $mahasiswa->tgl_lahir }}</td>
                        <td>{{ $mahasiswa->kontak }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>{{ $mahasiswa->semester }}</td>
                        <td>
                            <a href="{{ route('detailmhs', $mahasiswa->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
