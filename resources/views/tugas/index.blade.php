@extends('layouts.app')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="d-flex justify-content-between">
            <h2>Data Tugas</h2>

            @if (auth()->user()->role == 'mahasiswa')
            @else
                <div class="mb-3">
                    <a href="{{ route('tugas.create') }}" class="btn btn-primary">Tambah Tugas</a>
                </div>
            @endif
        </div>

        <table class="table-hover table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mata Kuliah</th>
                    <th>Semester</th>
                    <th>Pertemuan</th>
                    <th>Nilai</th>
                    <th>Tanggal Buat</th>
                    <th>Tanggal Deadline</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($queries as $tugas)
                    <tr>
                        <td>{{ $tugas->id }}</td>
                        <td>{{ $tugas->matkul }}</td>
                        <td>{{ $tugas->semester }}</td>
                        <td>{{ $tugas->pertemuan }}</td>
                        <td>{{ $tugas->nilai }}</td>
                        <td>{{ $tugas->tgl_buat }}</td>
                        <td>{{ $tugas->tgl_deadline }}</td>
                        <td>
                            <a href="{{ route('tugas.show', $tugas->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @if (auth()->user()->role == 'mahasiswa')
                                <a href="{{ route('tugas.edit', $tugas->id) }}" class="btn btn-warning btn-sm">Kumpulkan</a>
                            @elseif (auth()->user()->role == 'dosen')
                                <a href="{{ route('tugas.edit', $tugas->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline" action="{{ route('tugas.destroy', [$tugas->id]) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $queries->links() }}
    </div>

    @if (auth()->user()->role == 'dosen')
        <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
            <table class="table-hover table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tugas</th>
                        <th>Mahasiswa</th>
                        <th>Link</th>
                        <th>Tanggal Pengumpulan</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengumpulan as $pengumpulan)
                        <tr>
                            <td>{{ $pengumpulan->id }}</td>
                            <td>{{ $pengumpulan->tugas->matkul }}</td>
                            <td>{{ $pengumpulan->mahasiswa->user->name }}</td>
                            <td>{{ $pengumpulan->link }}</td>
                            <td>{{ $pengumpulan->created_at }}</td>
                            <td>{{ $pengumpulan->nilai }}</td>

                            <td>
                                <a href="{{ route('tugas.show', $tugas->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/tugas/{{ $tugas->id }}/pengumpulan" class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline" action="{{ route('tugas.destroy', [$tugas->id]) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
    @endif

@endsection
