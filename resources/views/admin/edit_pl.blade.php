<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Lulusan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Profil Lulusan</h2>
    <!-- Form untuk edit PL -->
    <form action="{{ route('update.pl', $pl->id) }}" method="POST">
        @csrf
        <!-- Tidak perlu menggunakan @method('PUT') karena kita memakai POST -->

        <div class="mb-3">
            <label for="kode_pl" class="form-label">Kode PL</label>
            <input type="text" class="form-control" id="kode_pl" name="kode_pl" value="{{ $pl->kode_pl }}" required>
        </div>

        <div class="mb-3">
            <label for="profil_lulusan" class="form-label">Profil Lulusan</label>
            <input type="text" class="form-control" id="profil_lulusan" name="profil_lulusan" value="{{ $pl->profil_lulusan }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ $pl->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="threshold" class="form-label">Threshold</label>
            <input type="number" class="form-control" id="threshold" name="threshold" value="{{ $pl->threshold }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('manage.pl') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
