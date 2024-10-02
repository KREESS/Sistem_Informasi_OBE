<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
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

            <main id="content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <nav class="navbar navbar-light bg-light" id="navbar">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="path/to/your/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                        OBE Dashboard
                    </a>
                    <!-- Toggle button -->
                    <button class="btn btn-primary" id="toggleSidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            <!-- Tabel Profil Lulusan (PL) -->
            <div class="container mt-4">
                <h2>Daftar Profil Lulusan (PL)</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode PL</th>
                            <th>Profil Lulusan</th>
                            <th>Deskripsi</th>
                            <th>Threshold</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pls as $pl)
                        <tr>
                            <td>{{ $pl->kode_pl }}</td>
                            <td>{{ $pl->profil_lulusan }}</td>
                            <td>{{ $pl->deskripsi }}</td>
                            <td>{{ $pl->threshold }}</td>
                            <td>
                                <a href="{{ route('edit.pl', $pl->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('delete.pl', $pl->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS to toggle sidebar -->
    <script>
        // JavaScript/jQuery to toggle the sidebar and adjust header
        $('#toggleSidebar').on('click', function () {
            $('#sidebar').toggleClass('toggled');
            $('#content').toggleClass('toggled');
            $('.navbar').toggleClass('toggled'); // Add header toggle
        });
    </script>

</body>
</html>
