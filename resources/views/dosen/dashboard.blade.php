<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard dosen</h1>
    <p>Anda login sebagai: {{ Auth::user()->name }}</p>
    

    {{-- Tampilkan role pengguna --}}
    <p>Role Anda: {{ Auth::user()->getRoleNames()->implode(', ') }}</p>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
</body>
</html>
