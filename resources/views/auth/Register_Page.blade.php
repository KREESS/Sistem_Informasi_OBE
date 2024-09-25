<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 100px;
            padding-bottom: 40px;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 2rem;
        }
        .form-floating {
            margin-bottom: 1rem;
        }
        .btn-register {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }
        .animate__animated {
            animation-duration: 0.5s;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5 animate__animated animate__fadeIn">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Daftar Akun</h5>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
                                <label for="fullname">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                <label for="password-confirm">Konfirmasi Password</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-register text-uppercase fw-bold animate__animated animate__pulse" type="submit">Daftar</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
