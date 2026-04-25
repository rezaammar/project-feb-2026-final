<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Stock Realize</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS biasa --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Manifest PWA --}}
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#198754">

    {{-- <style>
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
    </style> --}}
</head>
<body>

    <!-- PREMIUM MODAL jika klik tools di nav mobile-->
    <div class="modal fade" id="premiumModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Akses Ditolak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <div class="mb-3">
                        <x-heroicon-o-lock-closed style="width:50px;height:50px;color:#dc3545"/>
                    </div>

                    <p class="mb-0">
                        Kamu belum berlangganan.<br>
                        Silakan berlangganan terlebih dahulu untuk mengakses fitur ini.
                    </p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>

                    <a href="/subscribe" class="btn btn-primary">
                        Berlangganan
                    </a>
                </div>

            </div>
        </div>
    </div>

<!-- Navbar -->
@include('partials._navbar')

<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="col-lg-2 sidebar bg-dark text-white p-3 vh-100 d-none d-lg-block">

        <ul class="nav flex-column">
            @if(Auth::user()->status->status == 'Active')
            <!-- Menu untuk Member Aktif -->

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" 
                    class="nav-link text-white menu {{ (request()->routeIs('dashboard') || request()->routeIs('dashboardpremium')) ? 'active' : '' }}">
                    <x-heroicon-o-home style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('average') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('average') ? 'active' : '' }}">
                    <x-heroicon-o-calculator style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Average Up Down</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teoritis') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('teoritis') ? 'active' : '' }}">
                    <x-heroicon-o-variable style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Hitung Teoritis</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menutebusri') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('menutebusri') ? 'active' : '' }}">
                    <x-heroicon-o-underline style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Hitung Tebus RI</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rasio') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('rasio') ? 'active' : '' }}">
                    <x-heroicon-o-sparkles style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Ai Rasio RI</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('berita') ? 'active' : '' }}">
                    <x-heroicon-o-information-circle style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Informasi Saham</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transactions') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('transactions') ? 'active' : '' }}">
                    <x-heroicon-o-credit-card style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Riwayat Transaksi</span></a>
                </li>
            @else
            <!-- Layout/Menu untuk Member Non-Aktif -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <x-heroicon-o-home style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('averagefree') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('averagefree') ? 'active' : '' }}">
                    <x-heroicon-o-calculator style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Average Up Down</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >
                    <x-heroicon-o-variable style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Hitung Teoritis</span>
                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >
                    <x-heroicon-o-underline style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Hitung Tebus RI</span>
                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >
                    <x-heroicon-o-sparkles style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Ai Rasio RI</span>
                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >
                    <x-heroicon-o-information-circle style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Informasi Saham</span>
                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transactions') }}" 
                    class="nav-link text-white menu {{ request()->routeIs('transactions') ? 'active' : '' }}">
                    <x-heroicon-o-credit-card style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Riwayat Transaksi</span></a>
                </li>
            @endif
        </ul>
    </div>

    <!-- Content -->
    <div id="content" class="p-4 pb-5">
        @yield('content')
    </div>
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

    // Klik tombol
    toggleBtn.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");

        if (sidebar.classList.contains("collapsed")) {
            localStorage.setItem("sidebar", "collapsed");
        } else {
            localStorage.setItem("sidebar", "expanded");
        }
    });

    // Load state
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarState = localStorage.getItem("sidebar");

        if (sidebarState === "collapsed") {
            sidebar.classList.add("collapsed");
        }
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
