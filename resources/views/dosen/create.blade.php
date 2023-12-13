@extends('layouts.app')
@section('title', 'Dosen')

@section('content')
    <div class="rounded-4 p-5 mb-5 shadow-lg">
        <div class="d-flex justify-content-between">
            <div class="">
                <h2 class="text-dark m-0">Tambah Data Dosen</h2>
            </div>
            <a href="{{ route('dosen.index') }}" class="btn btn-success btn-xs btn-flat"><i class="fa fa-arrow-left"></i>
                Kembali </a>
        </div>
        <br>
        <form action="{{ route('dosen.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p><b>Kolom bertanda <span class="text-danger">*</span> tidak boleh
                    kosong</b></p>
            <div class="row">
                <div class="col px-4">
                    <div class="row py-2">
                        <label for="">NIP <span class="text-danger">*</span></label>
                        <input type="text" name="nip"
                            class="form-control @if ($errors->has('nip')) is-invalid @endif"
                            placeholder="Masukkan NIP" value="{{ old('nip') }}">
                        @if ($errors->has('nip'))
                            <small class="text-danger">
                                {{ $errors->first('nip') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="nama"
                            class="form-control @if ($errors->has('nama')) is-invalid @endif"
                            placeholder="Masukkan Nama" value="{{ old('nama') }}">
                        @if ($errors->has('nama'))
                            <small class="text-danger">
                                {{ $errors->first('nama') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tgl_lahir"
                            class="form-control @if ($errors->has('tgl_lahir')) is-invalid @endif"
                            placeholder="Masukkan Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                        @if ($errors->has('tgl_lahir'))
                            <small class="text-danger">
                                {{ $errors->first('tgl_lahir') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Alamat <span class="text-danger">*</span></label>
                        <input type="text" name="alamat"
                            class="form-control @if ($errors->has('alamat')) is-invalid @endif"
                            placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                        @if ($errors->has('alamat'))
                            <small class="text-danger">
                                {{ $errors->first('alamat') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Kontak <span class="text-danger">*</span></label>
                        <input type="text" name="kontak"
                            class="form-control @if ($errors->has('kontak')) is-invalid @endif"
                            placeholder="Masukkan Kontak" value="{{ old('kontak') }}">
                        @if ($errors->has('kontak'))
                            <small class="text-danger">
                                {{ $errors->first('kontak') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email"
                            class="form-control @if ($errors->has('email')) is-invalid @endif"
                            placeholder="Masukkan Email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <small class="text-danger">
                                {{ $errors->first('email') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Dosen Mata Kuliah <span class="text-danger">*</span></label>
                        <input type="text" name="dosen_matkul"
                            class="form-control @if ($errors->has('dosen_matkul')) is-invalid @endif"
                            placeholder="Masukkan Dosen Mata Kuliah" value="{{ old('dosen_matkul') }}">
                        @if ($errors->has('dosen_matkul'))
                            <small class="text-danger">
                                {{ $errors->first('dosen_matkul') }}
                            </small>
                        @endif
                    </div>
                </div>
                <div class="col px-5">
                    <div class="row py-2">
                        <label for="">Foto <span class="text-danger">*</span></label>
                        <input type="file" name="foto"
                            class="form-control @if ($errors->has('foto')) is-invalid @endif"
                            placeholder="Pilih Foto" value="{{ old('foto') }}">
                        <small>Tipe Foto: JPG/JPEG/PNG. Max: 10 MB.</small>
                        @if ($errors->has('foto'))
                            <br>
                            <small class="text-danger">
                                {{ $errors->first('foto') }}
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="my-2">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Data</button>
                    <a href="{{ route('dosen.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection
