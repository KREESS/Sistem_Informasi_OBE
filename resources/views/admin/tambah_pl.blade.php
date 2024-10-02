<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah PL</title>
    <!-- Menggunakan Bootstrap 5.3 untuk tampilan lebih modern -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .navbar-brand:hover {
            color: #e0e0e0;
        }
        #content {
            margin-top: 70px;
        }
        h1 {
            font-size: 2.5rem;
            color: #343a40;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .alert-success {
            margin-top: 20px;
        }
        #sidebar {
            background-color: #343a40;
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            transition: margin-left 0.3s ease;
            margin-left: -250px;
        }
        #sidebar.toggled {
            margin-left: 0;
        }
        .sidebar-header {
            padding: 20px;
            color: #fff;
            text-align: center;
            background: #0d6efd;
        }
        .sidebar a {
            padding: 10px;
            color: #fff;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #0d6efd;
            color: white;
        }
        .form-floating label {
            padding-left: 0.8rem;
        }
        .btn-container {
            text-align: right;
        }
    </style>
</head>
<body>
<!-- Sidebar -->
@include('sidebar_admin.header_admin')

<!-- Content Area -->
<div id="content" class="container">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="path/to/your/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                OBE Dashboard
            </a>
            <button class="btn btn-outline-light" id="toggleSidebar" aria-label="Toggle sidebar">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Form Section -->
    <div class="form-container mt-5">
        <h1>Tambah Profil Lulusan (PL)</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pl.store') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="kode_pl" class="form-control" id="kode_pl" placeholder="Kode PL" required>
                <label for="kode_pl">Kode PL</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="profil_lulusan" class="form-control" id="profil_lulusan" placeholder="Profil Lulusan" required>
                <label for="profil_lulusan">Profil Lulusan</label>
            </div>

            <div class="form-floating mb-3">
                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi" style="height: 100px"></textarea>
                <label for="deskripsi">Deskripsi</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" name="threshold" class="form-control" id="threshold" min="0" max="100" placeholder="Threshold" required>
                <label for="threshold">Threshold</label>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS and FontAwesome -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<!-- Custom JS untuk toggle sidebar -->
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('toggled');
        document.getElementById('content').classList.toggle('toggled');
    });
</script>
</body>
</html>
