@extends('layouts.app')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <h2>Tambah Tugas</h2>

        <form action="{{ route('tugas.store') }}" class="row" method="POST">
            @csrf
            <div class="form-group col-6">
                <label for="matkul">Mata Kuliah <span class="text-danger">*</span></label>
                <select name="matkul" class="form-control @if ($errors->has('matkul')) is-invalid @endif">
                    <option value="" selected disabled>Mata Kuliah SI Semester 3</option>
                    <option value="Sistem Informasi Manajemen"
                        {{ old('matkul') == 'Sistem Informasi Manajemen' ? 'selected' : '' }}>Sistem Informasi Manajemen
                    </option>
                    <option value="Akuntansi" {{ old('matkul') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                    <option value="Statistika" {{ old('matkul') == 'Statistika' ? 'selected' : '' }}>Statistika</option>
                    <option value="PSBO" {{ old('matkul') == 'PSBO' ? 'selected' : '' }}>PSBO</option>
                    <option value="Sistem Operasi" {{ old('matkul') == 'Sistem Operasi' ? 'selected' : '' }}>Sistem Operasi
                    </option>
                    <option value="Web Programm" {{ old('matkul') == 'Web Programm' ? 'selected' : '' }}>Web Programm
                    </option>
                    <!-- Penambahan opsi "Sistem Operasi" akan diabaikan, karena sudah ada di atas -->
                </select>
            </div>
            <div class="form-group col-6">
                <label for="semester">Semester <span class="text-danger">*</span></label>
                <select name="semester" class="form-control @if ($errors->has('semester')) is-invalid @endif">
                    <option value="" selected disabled>Pilih Semester</option>
                    <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                    <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                    <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>Semester 3</option>
                    <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>Semester 4</option>
                    <option value="5" {{ old('semester') == '5' ? 'selected' : '' }}>Semester 5</option>
                    <option value="6" {{ old('semester') == '6' ? 'selected' : '' }}>Semester 6</option>
                    <option value="7" {{ old('semester') == '7' ? 'selected' : '' }}>Semester 7</option>
                    <option value="8" {{ old('semester') == '8' ? 'selected' : '' }}>Semester 8</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label for="pertemuan">Pertemuan:</label>
                <select name="semester" class="form-control @if ($errors->has('semester')) is-invalid @endif">
                    <option value="" selected disabled>Pertemuan</option>
                    <option value="1" {{ old('pertemuan') == '1' ? 'selected' : '' }}>Pertemuan 1</option>
                    <option value="2" {{ old('pertemuan') == '2' ? 'selected' : '' }}>Pertemuan 2</option>
                    <option value="3" {{ old('pertemuan') == '3' ? 'selected' : '' }}>Pertemuan 3</option>
                    <option value="4" {{ old('pertemuan') == '4' ? 'selected' : '' }}>Pertemuan 4</option>
                    <option value="5" {{ old('pertemuan') == '5' ? 'selected' : '' }}>Pertemuan 5</option>
                    <option value="6" {{ old('pertemuan') == '6' ? 'selected' : '' }}>Pertemuan 6</option>
                    <option value="7" {{ old('pertemuan') == '7' ? 'selected' : '' }}>Pertemuan 7</option>
                    <option value="8" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 8</option>
                    <option value="9" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 9</option>
                    <option value="10" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 10</option>
                    <option value="11" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 11</option>
                    <option value="12" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 12</option>
                    <option value="13" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 13</option>
                    <option value="14" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 14</option>
                    <option value="15" {{ old('pertemuan') == '8' ? 'selected' : '' }}>Pertemuan 15</option>
                </select>
            </div>
            <div class="form-group col-6">
                <label for="tgl_buat">Tanggal Pembuatan:</label>
                <input type="date" class="form-control" id="tgl_buat" name="tgl_buat" required>
            </div>
            <div class="form-group col-6">
                <label for="tgl_deadline">Tanggal Deadline:</label>
                <input type="date" class="form-control" id="tgl_deadline" name="tgl_deadline" required>
            </div>
            <div class="form-group col-6">
                <label for="tgl_pengumpulan">Tanggal Pengumpulan:</label>
                <input type="date" class="form-control" id="tgl_pengumpulan" name="tgl_pengumpulan">
            </div>
            <div class="form-group col-6">
                <label for="link_tugas">Link Tugas:</label>
                <input type="text" class="form-control" id="link_tugas" name="link_tugas">
            </div>
            <div class="form-group col-6">
                <label for="nilai">Nilai:</label>
                <input type="number" class="form-control" id="nilai" name="nilai">
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary me-3">Simpan</button>
                <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
