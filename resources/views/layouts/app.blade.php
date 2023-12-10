<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Optional: Add your own CSS styles here -->
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Task Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('tugas*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tugas.index') }}">Tugas</a>
                </li>
                <li class="nav-item {{ Request::is('dosen*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dosen.index') }}">Dosen</a>
                </li>
                <li class="nav-item {{ Request::is('mahasiswa*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Optional: Add your own JavaScript scripts here -->

</body>
</html>
