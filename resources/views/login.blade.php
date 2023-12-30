<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.M.T</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Optional: Add your own CSS styles here -->
    <style>
        body {
            background-color: hsl(0, 0%, 96%);
        }
    </style>
</head>

<body>
    <!-- Jumbotron -->
    <div class="text-lg-start m-5 px-4 py-5 text-center" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-lg-0 mb-5">
                    <h1 class="display-5 fw-bold ls-tight my-5">
                        Sistem Manajemen Tugas <br />
                        <span class="text-primary">Mahasiswa</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Selamat Datang di Website uuntuk manajemen tugas mahasiswa!
                    </p>
                </div>

                <div class="col-lg-6 mb-lg-0 mb-5">
                    <div class="card">
                        <div class="card-body px-md-5 py-5">
                            <form action="/login" method="post">
                                @csrf
                                <h3 class>Login</h3>
                                <!-- Email input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="email" name="email" id="form3Example3" class="form-control" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- Optional: Add your own JavaScript scripts here -->

</body>

</html>
