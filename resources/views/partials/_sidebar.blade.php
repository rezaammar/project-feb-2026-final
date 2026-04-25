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
            <span>Avg</span>
        </a>
        <a href="{{ route('teoritis') }}" class="nav-item {{ request()->routeIs('teoritis') ? 'active' : '' }}">
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