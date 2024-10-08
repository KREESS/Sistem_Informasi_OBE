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

            <!-- Main content -->
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

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Selamat Datang di Dashboard Admin</h1>
                </div>

                <p>Anda login sebagai: {{ Auth::user()->name }}</p>
                <p>Role Anda: {{ Auth::user()->getRoleNames()->implode(', ') }}</p>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
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
