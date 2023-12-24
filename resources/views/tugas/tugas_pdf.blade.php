<!-- resources/views/tugas_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
</head>
<body>
    <h1>Daftar Tugas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
                <th>Pertemuan</th>
                <th>Nilai</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Deadline</th>
                <th>File Tugas</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($query as $tugas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tugas->matkul }}</td>
                    <td>{{ $tugas->semester }}</td>
                    <td>{{ $tugas->pertemuan }}</td>
                    <td>{{ $tugas->nilai }}</td>
                    <td>{{ $tugas->tgl_buat }}</td>
                    <td>{{ $tugas->tgl_dl }}</td>
                    <td>{{ $tugas->file_tugas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
