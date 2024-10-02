<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Akun</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
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

        /* Sembunyikan scroll tapi tetap bisa di-scroll */
        .table-responsive {
            overflow-x: auto; /* Enable horizontal scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
            -ms-overflow-style: none;  /* Hide scrollbar in Internet Explorer and Edge */
            scrollbar-width: none;  /* Hide scrollbar in Firefox */
        }

        .table-responsive::-webkit-scrollbar {
            display: none; /* Hide scrollbar in Chrome, Safari, and Opera */
        }

        /* Hide vertical scrollbar */
        .table-responsive::-webkit-scrollbar:vertical {
            width: 0; /* Set width to 0 to hide the scrollbar */
        }

        /* Hide horizontal scrollbar */
        .table-responsive::-webkit-scrollbar:horizontal {
            height: 0; /* Set height to 0 to hide the scrollbar */
        }

        /* Style for DataTables pagination buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5rem 1rem; /* Add padding */
            margin: 0 0.1rem; /* Margin between buttons */
            border-radius: 0.25rem; /* Rounded corners */
            border: 1px solid #007bff; /* Border color */
            color: #007bff; /* Text color */
            background: #fff; /* Background color */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #007bff; /* Active page background */
            color: #fff; /* Active page text color */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #007bff; /* Hover background */
            color: #fff; /* Hover text color */
        }

        /* Additional styling for the table */
        table {
            border-collapse: collapse; /* Collapse borders for cleaner look */
        }
        
        th {
            background-color: #007bff; /* Header background color */
            color: white; /* Header text color */
            padding: 10px; /* Padding for header cells */
        }
        
        td {
            padding: 10px; /* Padding for data cells */
        }
        
        tr:hover {
            background-color: #f1f1f1; /* Row hover effect */
        }

        .dataTables_wrapper .dataTables_info {
            margin-top: 20px; /* Add margin to info text */
        }
    </style>
</head>
<body>

@include('sidebar_admin.header_admin')


<div id="content">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="path/to/your/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                OBE Dashboard
            </a>
            <!-- Toggle button -->
            <button class="btn btn-primary" id="toggleSidebar" aria-label="Toggle sidebar">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </nav>

    <div class="container mt-4 mb-4">
        <h2 class="mb-4">Manage Users & Roles</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="userTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIDN / NIM</th>
                        <th>Roles</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan dimuat oleh DataTables -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            processing: true, // Menampilkan animasi loading
            serverSide: true, // Menggunakan server-side processing
            ajax: '{{ route('api.get_users') }}', // URL untuk mengambil data
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { 
                    data: 'nidn_nim', 
                    name: 'nidn_nim', 
                    searchable: true // Kolom NIDN / NIM bisa dicari
                },
                { 
                    data: 'roles', 
                    name: 'roles', 
                    orderable: false, 
                    searchable: false // Kolom roles tidak perlu searchable
                },
                { 
                    data: 'aksi', 
                    name: 'aksi', 
                    orderable: false, 
                    searchable: false // Kolom aksi tidak perlu searchable
                }
            ],
            // Customize the pagination controls
            "dom": '<"d-flex justify-content-between"f><"table-responsive"t><"d-flex justify-content-between"ilp>',
            "language": {
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                }
            }
        });
    });
</script>

<!-- Custom JS untuk toggle sidebar -->
<script>
    // JavaScript/jQuery untuk toggle sidebar
    $('#toggleSidebar').on('click', function () {
        $('#sidebar').toggleClass('toggled');
        $('#content').toggleClass('toggled');
        $('.navbar').toggleClass('toggled'); // Menambah toggle header
    });
</script>
</body>
</html>
