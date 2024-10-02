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
                    <i class="bi bi-caret-down-fill float-end"></i>
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
                                <i class="bi bi-pencil-square"></i> Edit & Hapus Akun & Roles
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#akunDropdown11" aria-expanded="false" aria-controls="akunDropdown11">
                    Kelola PL
                    <i class="bi bi-caret-down-fill float-end"></i>
                </a>
                <div class="collapse" id="akunDropdown11">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pl') }}">
                                <i class="bi bi-person-plus"></i> Tambah PL
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('manage.pl') }}">
                                <i class="bi bi-pencil-square"></i> Edit & Hapus PL & Relasi CPL
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#akunDropdown1" aria-expanded="false" aria-controls="akunDropdown1">
                    Kelola CPL
                    <i class="bi bi-caret-down-fill float-end"></i>
                </a>
                <div class="collapse" id="akunDropdown1">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cpl') }}">
                                <i class="bi bi-person-plus"></i> Tambah CPL
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('manage.cpl') }}">
                                <i class="bi bi-pencil-square"></i> Edit & Hapus CPL
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#akunDropdown2" aria-expanded="false" aria-controls="akunDropdown2">
                    Kelola CPMK
                    <i class="bi bi-caret-down-fill float-end"></i>
                </a>
                <div class="collapse" id="akunDropdown2">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-plus"></i> Tambah CPMK
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-pencil-square"></i> Edit & Hapus CPMK
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#akunDropdown3" aria-expanded="false" aria-controls="akunDropdown3">
                    Kelola Mata Kuliah
                    <i class="bi bi-caret-down-fill float-end"></i>
                </a>
                <div class="collapse" id="akunDropdown3">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-plus"></i> Approve Mata Kuliah
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-pencil-square"></i> Edit & Hapus 
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
