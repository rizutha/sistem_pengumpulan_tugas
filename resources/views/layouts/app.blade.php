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

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                Jacob, Uji Individu
                <img src="https://cdn3.iconfinder.com/data/icons/essential-rounded/64/Rounded-31-512.png" alt="Logo"
                    width="25" height="24" class="d-inline-block align-text-top">
            </a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    <h5 class="offcanvas-title mx-auto" id="offcanvasNavbarLabel">
                        <img src="https://cdn3.iconfinder.com/data/icons/essential-rounded/64/Rounded-31-512.png"
                            alt="Logo" width="25" height="24" class="d-inline-block align-text-top">
                            Task Management
                    </h5>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-0 pe-3">
                        <li class="nav-item">
                            <li class="nav-item {{ Request::is('tugas*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('tugas.index') }}">Tugas</a>
                            </li>
                            <li class="nav-item {{ Request::is('dosen*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('dosen.index') }}">Dosen</a>
                            </li>
                            <li class="nav-item {{ Request::is('mahasiswa*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                            </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Optional: Add your own JavaScript scripts here -->

</body>
</html>
