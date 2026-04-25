<div class="mobile-nav-wrapper d-lg-none">
    <div class="mobile-nav-tool" id="mobileNav">

        <a href="{{ route('teoritis') }}" class="nav-item-scroll {{ request()->is('teoritis') ? 'active' : '' }}">Teoritis</a>
        <a href="{{ route('index1') }}" class="nav-item-scroll {{ request()->is('index1') ? 'active' : '' }}">Lot Tebus RI</a>
        <a href="{{ route('index2') }}" class="nav-item-scroll {{ request()->is('index2') ? 'active' : '' }}">Biaya Tebus</a>
        <a href="{{ route('index3') }}" class="nav-item-scroll {{ request()->is('index3') ? 'active' : '' }}">Lot Final</a>
        <a href="{{ route('index4') }}" class="nav-item-scroll {{ request()->is('index4') ? 'active' : '' }}">Avg RI</a>
        <a href="{{ route('rasio') }}" class="nav-item-scroll {{ request()->is('rasio') ? 'active' : '' }}">AI Rasio</a>

        <!-- garis indikator -->
        <div class="nav-indicator" id="navIndicator"></div>
    </div>
</div>