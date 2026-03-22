<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Saham</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }

        /* Sidebar */
        #sidebar {
            width: 250px;
            transition: all 0.3s;
            /* border-right: 1px solid #eee; */
        }

        /* #sidebar.collapsed {
            margin-left: -250px;
        } */

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
            .sidebar {
                display: none;
            }

            .content {
                padding-bottom: 80px;
            }
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
    {{-- <button class="btn btn-outline-light d-lg-none" id="toggleSidebar">
        ☰
    </button> --}}
    <span class="navbar-brand ms-2">Stock Realize</span>
</nav>

<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="col-lg-2 sidebar bg-dark text-white p-3 vh-100 d-none d-lg-block">
        <h4 class="text-center">Menu</h4>
        <hr>
        <ul class="nav flex-column">
            @if(Auth::user()->status->status == 'Active')
            <!-- Menu untuk Member Aktif -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="/dashboard/free">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/average">Average Up Down</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/teoritis">Hitung Teoritis
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/menutebusri">Hitung Tebus RI
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/rasio">Ai Rasio RI
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/transactions">Riwayat Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/profile">Profile</a>
                </li>
                <li class="nav-item mt-3">
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-danger w-100">Logout</button>
                    </form>
                </li>
            @else
            <!-- Layout/Menu untuk Member Non-Aktif -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="/dashboard/free">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/averagefree">Average Up Down</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Hitung Teoritis
                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Hitung Tebus RI
                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Ai Rasio RI
                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Riwayat Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Profile</a>
                </li>
                <li class="nav-item mt-3">
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-danger w-100">Logout</button>
                    </form>
                </li>
            @endif
        </ul>
    </div>

    <!-- Content -->
    <div id="content" class="p-4">
        @yield('content')
    </div>
</div>

<!-- ===== Mobile Bottom Navigation ===== -->
<div class="mobile-nav d-lg-none">
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
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');

    // Auto collapse di mobile saat load
    if (window.innerWidth < 992) {
        sidebar.classList.add('collapsed');
    }

    // toggleBtn.addEventListener('click', () => {
    //     sidebar.classList.toggle('collapsed');
    // });
</script>

</body>
</html>
