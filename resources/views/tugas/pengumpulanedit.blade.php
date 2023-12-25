<!-- Pada file edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Nilai dan Komentar</h2>

    <form action="{{ route('pengumpulan.update', $pengumpulan->id) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nilai" name="nilai" value="{{ $pengumpulan->nilai }}" required>
        </div>
        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar Dosen</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="komentar" required>{{ $pengumpulan->komentar }} </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tugas.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
            Kembali</a>
    </form>
@endsection
