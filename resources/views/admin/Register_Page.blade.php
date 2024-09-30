<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

        /* Sidebar styling */
        #sidebar {
            position: fixed; /* Keep sidebar fixed */
            top: 0;
            left: 0;
            width: 250px; /* Sidebar width */
            height: 100%; /* Full height */
            z-index: 100; /* Ensure it is on top */
            background-color: #f8f9fa; /* Sidebar background color */
            transform: translateX(-100%); /* Initially hidden */
            transition: transform 0.9s ease; /* Smooth transition */
        }

        #sidebar.toggled {
            transform: translateX(0); /* Slide in */
        }

        #content {
            transition: margin-left 0.9s ease, width 0.9s ease; /* Smooth margin and width transition */
            margin-left: 0; /* Default margin */
            width: 100%; /* Full width by default */
        }

        #content.toggled {
            margin-left: 250px; /* Shift to the right when sidebar is open */
            width: calc(100% - 250px); /* Adjust width accordingly */
        }

        .navbar {
            transition: margin-left 0.9s ease; /* Transition for header */
        }

        .navbar.toggled {
            margin-left: 250px; /* Shift header when sidebar is open */
        }

        /* Optional: Hide the sidebar on smaller screens by default */
        @media (max-width: 767.98px) {
            #sidebar {
                transform: translateX(-100%); /* Start hidden */
            }

            #sidebar.toggled {
                transform: translateX(0); /* Show on toggle */
            }

            #content.toggled {
                margin-left: 0; /* No margin shift on small screens */
            }

            .navbar.toggled {
                margin-left: 0; /* No margin shift for navbar on small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('sidebar_admin.header_admin')

            <!-- Main content -->
            <main id="content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <nav class="navbar navbar-light bg-light" id="navbar">
                    <div class="container-fluid">
                        <!-- Logo -->
                        <a class="navbar-brand" href="#">
                            <img src="path/to/your/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                            OBE Buat Akun
                        </a>
                        <!-- Toggle button -->
                        <button class="btn btn-primary" id="toggleSidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class="card border-0 shadow rounded-3 my-5 animate__animated animate__fadeIn">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title text-center mb-5 fw-light fs-5">Daftar Akun</h5>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="" disabled selected>Pilih Role</option>
                                                <option value="mahasiswa">Mahasiswa</option>
                                                <option value="dosen">Dosen</option>
                                                <option value="ketua_kbk">Ketua KBK</option>
                                            </select>
                                            <label for="role">Role</label>
                                        </div>

                                        <div class="form-floating mb-3" id="nim-field" style="display: none;">
                                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <label for="nim">NIM (untuk Mahasiswa)</label>
                                        </div>

                                        <div class="form-floating mb-3" id="nidn-field" style="display: none;">
                                            <input type="text" class="form-control" id="nidn" name="nidn" placeholder="NIDN">
                                            <label for="nidn">NIDN (untuk Dosen dan Ketua KBK)</label>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            console.log('Role changed:', this.value);
            const role = this.value;
            const nimField = document.getElementById('nim-field');
            const nidnField = document.getElementById('nidn-field');
            const nimInput = document.getElementById('nim');
            const nidnInput = document.getElementById('nidn');

            // Sembunyikan kedua field terlebih dahulu
            nimField.style.display = 'none';
            nidnField.style.display = 'none';
            nimInput.required = false;
            nidnInput.required = false;

            if (role === 'mahasiswa') {
                nimField.style.display = 'block';
                nimInput.required = true;
            } else if (role === 'dosen' || role === 'ketua_kbk') {
                nidnField.style.display = 'block';
                nidnInput.required = true;
            }
        });

        // JavaScript/jQuery to toggle the sidebar and adjust header
        $('#toggleSidebar').on('click', function () {
            $('#sidebar').toggleClass('toggled');
            $('#content').toggleClass('toggled');
            $('.navbar').toggleClass('toggled');
        });
    </script>
</body>
</html>
