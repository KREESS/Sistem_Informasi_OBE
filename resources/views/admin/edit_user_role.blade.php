<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Role</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit User Role for {{ $user->name }}</h2>

    <form action="{{ route('admin.update_user_role', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nidn_nim">NIDN / NIM:</label>
            <input type="text" name="nidn_nim" id="nidn_nim" class="form-control" value="{{ $user->nidn ?? $user->nim }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="roles">Assign Roles:</label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" 
                        name="roles[]" 
                        id="role_{{ $role->id }}" 
                        value="{{ $role->id }}" 
                        class="form-check-input" 
                        {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="role_{{ $role->id }}">
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <!-- Password field -->
        <div class="form-group mb-3">
            <label for="password">New Password (Optional):</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Biarkan kosong jika tidak diubah">
        </div>

        <!-- Password confirmation field -->
        <div class="form-group mb-3">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Biarkan kosong jika tidak diubah">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update User</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
