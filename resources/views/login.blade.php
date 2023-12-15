<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.M.T</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Optional: Add your own CSS styles here -->
    <style>
        body{
            background-color: hsl(0, 0%, 96%);
        }
    </style>
</head>
<body >
        <!-- Jumbotron -->
        <div class="px-4 py-5 m-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
          <div class="container">
            <div class="row gx-lg-5 align-items-center">
              <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="my-5 display-5 fw-bold ls-tight">
                  Sistem Manajemen Tugas <br />
                  <span class="text-primary">Mahasiswa</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                  quibusdam tempora at cupiditate quis eum maiores libero
                  veritatis? Dicta facilis sint aliquid ipsum atque?
                </p>
              </div>

              <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card">
                  <div class="card-body py-5 px-md-5">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                       <h3 class>Login</h3>
                      <!-- Email input -->
                      <div class="form-outline mb-4 mt-4">
                        <input type="email" id="form3Example3" class="form-control" />
                        <label class="form-label" for="form3Example3">Email address</label>
                      </div>

                      <!-- Password input -->
                      <div class="form-outline mb-4">
                        <input type="password" id="form3Example4" class="form-control" />
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Optional: Add your own JavaScript scripts here -->

</body>
</html>
