@extends('layouts.app')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="d-flex justify-content-between">
            <h2>Data Mahasiswa</h2>

            <div class="mb-3">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
            </div>
        </div>

        <table class="table-hover table">
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
                @foreach ($queries as $query)
                    <tr>
                        <td>{{ $query->id }}</td>
                        <td>{{ $query->nim }}</td>
                        <td>{{ $query->user->name }}</td>
                        <td>{{ $query->alamat }}</td>
                        <td>{{ $query->tgl_lahir }}</td>
                        <td>{{ $query->kontak }}</td>
                        <td>{{ $query->email }}</td>
                        <td>{{ $query->prodi }}</td>
                        <td>{{ $query->semester }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.show', $query->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('mahasiswa.edit', $query->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $query->id) }}" method="POST"
                                style="display:inline;">
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

        {{ $queries->links() }}
    </div>
@endsection
