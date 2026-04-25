<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Realize</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Manifest PWA --}}
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#198754">
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }

        /* Sidebar */
        #sidebar {
            position: sticky;
            top: 0;
            width: 250px;
            transition: all 0.3s;
            /* border-right: 1px solid #eee; */
        }

        #sidebar.collapsed {
            margin-left: -250px;
        }

        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background: #5712d6;
        }
        /* Content */
        #content {
            width: 100%;
            /* transition: all 0.3s; */
        }

        /* ===== Bottom Nav Mobile ===== */
        .mobile-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #ffffff;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            padding: 8px 0;
            z-index: 999;
        }

        .mobile-nav a {
            text-decoration: none;
            font-size: 12px;
            color: #555;
            text-align: center;
        }

        .mobile-nav a.active {
            color: #0d6efd;
        }

        .mobile-nav i {
            display: block;
            font-size: 20px;
        }

        /* Hide bottom nav on desktop */
        @media (min-width: 992px) {
            .mobile-nav {
                display: none;
            }
        }

        /* Hide sidebar on mobile */
        @media (max-width: 991px) {
            /* .sidebar {
                display: none;
            } */

            .content {
                padding-bottom: 80px;
            }
        }
        /* CARD  */
        .gallery-container .card {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            background: #fff;
            transition: 0.3s;
        }

        .gallery-container .card:hover {
            transform: translateY(-5px);
        }

        .gallery-container .card img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        /* .card-body {
            padding: 10px;
        }

        .card-title {
            font-size: 14px;
            font-weight: bold;
        } */

        /* Tablet */
        @media (min-width: 768px) {
            .gallery-container .card {
                width: calc(50% - 15px);
            }
        }

        /* Laptop */
        @media (min-width: 1024px) {
            .gallery-container .card {
                width: calc(25% - 15px);
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
    <button class="btn btn-outline-light " id="toggleSidebar">
        ☰
    </button>
    <span class="navbar-brand ms-2">Admin Stock Realize</span>

</nav>

<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="col-lg-2 sidebar bg-dark text-white p-3 vh-100 ">
        <h4 class="text-center">Menu</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/laporan">Laporan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/datauser">Tabel User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/upload">Upload Informasi Saham</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/buku">Buku Gratis</a>
            </li>
            <li class="nav-item">
            <li class="nav-item mt-3">
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-danger w-100">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div id="content" class="p-4">
        @yield('content')
    </div>
</div>

<!-- ===== Mobile Bottom Navigation ===== -->
{{-- <div class="mobile-nav d-lg-none">
    <a href="/dashboard2" class="active">
        <i>🏠</i>
        Home
    </a>
    <a href="/products">
        <i>👥</i>
        Produk
    </a>
    <a href="#">
        <i>💳</i>
        Subs
    </a>
    <a href="#">
        <i>📊</i>
        Reports
    </a>
    <a href="#">
        <i>⚙</i>
        Settings
    </a>
</div> --}}

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');

    // Auto collapse di mobile saat load
    if (window.innerWidth < 992) {
        sidebar.classList.add('collapsed');
    }

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
</script>
{{-- Service Worker --}}
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js')
            .then(() => console.log('Service Worker Registered'));
    }
</script>

</body>
</html>
