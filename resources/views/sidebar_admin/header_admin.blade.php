<!-- resources/views/sidebar_admin/header_admin.blade.php -->

<nav id="sidebar" class="bg-light">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#akunDropdown" aria-expanded="false" aria-controls="akunDropdown">
                    Kelola Akun
                    <i class="bi bi-caret-down-fill float-end"></i> <!-- Dropdown icon -->
                </a>
                <div class="collapse" id="akunDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Tambah Akun
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('edit') }}">
                                <i class="bi bi-pencil-square"></i> Edit Akun & Roles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-trash"></i> Hapus Akun
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kelola CPL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kelola CPMK</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kelola Mata Kuliah</a>
            </li>
        </ul>
    </div>
</nav>
