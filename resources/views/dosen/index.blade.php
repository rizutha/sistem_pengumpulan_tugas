@extends('layouts.app')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="d-flex justify-content-between">
            <h2>Data Dosen</h2>

            <div class="mb-3">
                <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
            </div>
        </div>

        <table class="table-hover table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Dosen Matkul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $dosen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->nip }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->tgl_lahir }}</td>
                        <td>{{ $dosen->alamat }}</td>
                        <td>{{ $dosen->kontak }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>{{ $dosen->keilmuan }}</td>
                        <td>
                            <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
