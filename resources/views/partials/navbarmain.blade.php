
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container">
        <div>
            <img src="{{ asset('images/logowhite.jpg') }}"
                alt=""
                class="rounded-circle img-main-setup me-2"
                width="50"
                height="50"
                style="object-fit: cover;">
            <a class="navbar-brand navbar-main-setup fw-bold" style="color: blue" href="#">Stock Realize</a>
        </div>

        {{-- Right class main-setup untuk CSS--}}
        <div class="ms-auto d-flex align-items-center">
            <div>
                <div class="nav-item me-3">
                    <button id="installBtn" class="btn install-main-setup btn-primary btn-sm d-none">
                        <x-heroicon-o-arrow-down-tray style="height: 15px; width: 15px; vertical-align: middle; margin-right: 0.25rem;" class="icon me-1" />    
                        Install App
                    </button>
                </div>
            </div>
            <div>
                <a href="/login" class="btn login-main-setup btn-outline-primary me-2">Login</a>
                
            </div>
        </div>
    </div>
</nav>