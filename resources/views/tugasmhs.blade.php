@extends('layouts.app')

@section('content')
<!-- Sertakan Bootstrap CSS dan JS (gantilah dengan jalur file yang sesuai) -->

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
                                class="btn btn-success">Download</a>
                        @else
                            Tidak ada file
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-primary" onclick="showInputForm({{ $tugas->id }})">Kerjakan</button>

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

            // Kirim linkJawaban ke server menggunakan AJAX atau metode lainnya
            // Contoh menggunakan fetch
            fetch('/pengumpulan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Sesuaikan dengan metode pengiriman CSRF token di aplikasi Anda
                },
                body: JSON.stringify({
                    tugas_id: tugasId,
                    link_tugas: linkTugas
                    // tambahkan data lain yang diperlukan
                })
            })
            .then(response => response.json())
            .then(data => {
                // Tanggapi respons dari server
                console.log(data);

                // Tampilkan pesan sukses atau error menggunakan SweetAlert
                if (data.success) {
                    Swal.fire('Sukses!', 'Tugas berhasil diumpulkan.', 'success');
                } else {
                    Swal.fire('Error!', 'Gagal mengumpulkan tugas.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);

                // Tampilkan pesan error menggunakan SweetAlert
                Swal.fire('Error!', 'Terjadi kesalahan saat mengumpulkan tugas.', 'error');
            });
        }
    });
}

</script>


<script src="{{ asset('path/to/jquery-3.6.4.min.js') }}"></script>

<!-- Tambahkan SweetAlert2 CSS dan JS (gantilah dengan jalur file yang sesuai) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.js"></script>



@endsection
