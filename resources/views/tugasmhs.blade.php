@extends('layouts.app')

@section('content')
<!-- Sertakan Bootstrap CSS dan JS (gantilah dengan jalur file yang sesuai) -->

<div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
    <div class="d-flex justify-content-between">
        <h2>Data Tugas</h2>

            <div class="mb-3">
                <a href="/pengumpulan" class="btn btn-primary">Tugas Selesai</a>
            </div>
    </div>

    <table class="table-hover table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
                <th>Pertemuan</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Deadline</th>
                <th>File Tugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($queries as $tugas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tugas->matkul }}</td>
                    <td>{{ $tugas->semester }}</td>
                    <td>{{ $tugas->pertemuan }}</td>
                    <td>{{ $tugas->tgl_buat }}</td>
                    <td>{{ $tugas->tgl_dl }}</td>
                    <td>
                        @if ($tugas->file_tugas)
                            <a href="{{ asset('storage/filetugas/' . $tugas->file_tugas) }}"
                                class="btn btn-success btn-sm">Download</a>
                        @else
                            Tidak ada file
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="showInputForm({{ $tugas->id }})">Kerjakan</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $queries->links() }}
</div>

<script>
function showInputForm(tugasId) {
    Swal.fire({
        title: 'Input Link Tugas',
        html:
            '<input type="text" id="link_tugas" class="swal2-input" placeholder="Link Jawaban">',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        preConfirm: () => {
            const linkTugas = Swal.getPopup().querySelector('#link_tugas').value;
            if (!linkTugas) {
                Swal.showValidationMessage('Link Jawaban harus diisi');
            }
            return { linkTugas: linkTugas };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const linkTugas = result.value.linkTugas;

            // Arahkan pengguna ke rute pengumpulan/create dengan tugas_id dan link_tugas
            window.location.href = `/pengumpulan/create?tugas_id=${tugasId}&link_tugas=${linkTugas}`;
        }
    });
}


</script>


<script src="{{ asset('path/to/jquery-3.6.4.min.js') }}"></script>

<!-- Tambahkan SweetAlert2 CSS dan JS (gantilah dengan jalur file yang sesuai) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.js"></script>



@endsection
