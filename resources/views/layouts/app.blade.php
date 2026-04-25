<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Realize</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="/images/favicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS biasa --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Manifest PWA --}}
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#198754">
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        
    </style>
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

                    <a href="/payment" class="btn btn-primary">
                        Berlangganan
                    </a>
                </div>

            </div>
        </div>
    </div>

<!-- Navbar -->
{{-- <nav class="navbar navbar-dark bg-dark px-3">
    <button class="btn btn-outline-light" id="toggleSidebar">
        ☰
    </button>
    <span class="navbar-brand ms-2">Stock Realize</span>
</nav> --}}

@include('partials._navbar')
@if(
        request()->route()->getName() == 'teoritis' ||
        request()->route()->getName() == 'index1' ||
        request()->route()->getName() == 'index2' ||
        request()->route()->getName() == 'index3' ||
        request()->route()->getName() == 'index4' ||
        request()->route()->getName() == 'rasio'
    )
    @include('partials._navscroll')
@endif

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
                    class="
                        nav-link text-white menu 
                        {{ request()->routeIs('menutebusri') ? 'active' : '' }}
                        {{ request()->routeIs('index1') ? 'active' : '' }}
                        {{ request()->routeIs('index2') ? 'active' : '' }}
                        {{ request()->routeIs('index3') ? 'active' : '' }}
                        {{ request()->routeIs('index4') ? 'active' : '' }}
                    ">
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
                    class="nav-link text-white menu menuberita {{ request()->routeIs('berita') ? 'active' : '' }}">
                    <x-heroicon-o-information-circle style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                    <span>Informasi Saham</span>
                    @if($notifCount > 0)
                        <span class="badge">{{ $notifCount }}</span>
                    @endif
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

<!-- ===== Mobile Bottom Navigation ===== -->
<div class="mobile-nav d-lg-none">
    @if(Auth::user()->status->status == 'Active')
    <!-- Menu untuk Member Aktif -->
        <a href="{{ route('dashboard') }}" class="nav-item {{ (request()->routeIs('dashboard') || request()->routeIs('dashboardpremium')) ? 'active' : '' }}">
            <x-heroicon-o-home class="icon"/>
            <span>Home</span>
        </a>
        <a href="{{ route('average') }}" class="nav-item {{ request()->routeIs('average') ? 'active' : '' }}">
            <x-heroicon-o-calculator class="icon"/>
            <span>Average</span>
        </a>
        <a href="{{ route('teoritis') }}" 
            class="
                nav-item
                    {{ request()->routeIs('teoritis') ? 'active' : '' }}
                    {{ request()->routeIs('index1') ? 'active' : '' }}
                    {{ request()->routeIs('index2') ? 'active' : '' }}
                    {{ request()->routeIs('index3') ? 'active' : '' }}
                    {{ request()->routeIs('index4') ? 'active' : '' }}
                    {{ request()->routeIs('rasio') ? 'active' : '' }} 
        ">
            <x-heroicon-o-presentation-chart-line class="icon"/>
            <span>Tools</span>
        </a>
        <a href="{{ route('berita') }}" class="nav-item {{ request()->routeIs('berita') ? 'active' : '' }}">
            <x-heroicon-o-information-circle class="icon"/>
            <span>Informasi</span>
            {{-- disimpan di app/provider/appserviceprovider --}}
            @if($notifCount > 0) 
                <span class="badge">{{ $notifCount }}</span>
            @endif
        </a>
        <a href="{{ route('transactions') }}" class="nav-item {{ request()->routeIs('transactions') ? 'active' : '' }}">
            <x-heroicon-o-credit-card class="icon"/>
            <span>Riwayat</span>
        </a>

    @else
    <!-- Layout/Menu untuk Member Non-Aktif -->
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <x-heroicon-o-home class="icon"/>
            <span>Home</span>
        </a>
        <a href="{{ route('averagefree') }}" class="nav-item {{ request()->routeIs('averagefree') ? 'active' : '' }}">
            <x-heroicon-o-calculator class="icon"/>
            <span>AVG</span>
        </a>

        <a href="{{ route('tools') }}" class="nav-item {{ request()->routeIs('tools') ? 'active' : '' }}" data-bs-toggle="modal" data-bs-target="#premiumModal">
            <x-heroicon-o-presentation-chart-line class="icon"/>
            <span>Tools</span>
        </a>
        <a href="{{ route('tools') }}" class="nav-item {{ request()->routeIs('tools') ? 'active' : '' }}" data-bs-toggle="modal" data-bs-target="#premiumModal">
            <x-heroicon-o-information-circle class="icon"/>
            <span>Informasi</span>
            @if($notifCount > 0)
                <span class="badge">{{ $notifCount }}</span>
            @endif
        </a>
        <a href="{{ route('transactions') }}" class="nav-item {{ request()->routeIs('transactions') ? 'active' : '' }}">
            <x-heroicon-o-credit-card class="icon"/>
            <span>Riwayat</span>
        </a>

    @endif
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

    // function toggleSidebar() {
    // let sidebar = document.getElementById('sidebar');
    // let content = document.getElementById('content');

    // sidebar.classList.toggle('collapsed');
    // content.classList.toggle('collapsed');
    // }

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

    // Navigasi Scroll di Tools
    document.addEventListener("DOMContentLoaded", function () {
        const navItems = document.querySelectorAll(".nav-item-scroll");
        const indicator = document.getElementById("navIndicator");

        function moveIndicator(el) {
            const rect = el.getBoundingClientRect();
            const parentRect = el.parentElement.getBoundingClientRect();

            indicator.style.width = rect.width + "px";
            indicator.style.left = (rect.left - parentRect.left) + "px";
        }

        // set awal
        const activeItem = document.querySelector(".nav-item-scroll.active");
        if (activeItem) moveIndicator(activeItem);

        navItems.forEach(item => {
            item.addEventListener("click", function () {
                navItems.forEach(i => i.classList.remove("active"));
                this.classList.add("active");

                moveIndicator(this);

                // auto scroll ke tengah (biar smooth UX)
                this.scrollIntoView({
                    behavior: "smooth",
                    inline: "center",
                    block: "nearest"
                });
            });
        });

        window.addEventListener("resize", () => {
            const activeItem = document.querySelector(".nav-item-scroll.active");
            if (activeItem) moveIndicator(activeItem);
        });
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
