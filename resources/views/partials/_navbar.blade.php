{{-- <div class="navbar">
    <div class="toggle-btn" onclick="toggleSidebar()">☰</div>
    <div>My Dashboard</div>
</div> --}}
<nav class="navbar navbar-dark bg-dark border-bottom px-3">

    <!-- LEFT -->
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-sm btn-light d-none d-md-block" id="toggleSidebar">
            ☰
        </button>
        <img src="{{ asset('images/logoblack.jpg') }}"
                alt=""
                class="rounded-circle ms-2 me-1"
                width="50"
                height="50"
                style="object-fit: cover;">
        <span class="fw-semibold">Stock Realize</span>
    </div>

    <!-- RIGHT -->
    <div class="ms-auto d-flex align-items-center">

                <a href="{{ route('sosial') }}" 
                    class="nav-link text-white menu {{ (request()->routeIs('sosial') ) ? 'activegrup' : '' }}">
                    <x-heroicon-o-user-group style="height: 2em; width: 2em; vertical-align: middle; margin-right: 0.25rem;" class="icon me-3" />
                </a>
        <!-- DROPDOWN PROFILE -->
        <div class="dropdown">
            {{-- <div class="d-flex align-items-center gap-2 cursor-pointer">
                <a href="{{ route('sosial') }}" 
                    class="nav-link text-white menu {{ (request()->routeIs('sosial') ) ? 'activegrup' : '' }}">
                    <x-heroicon-o-user-group style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                </a>
            </div> --}}


            <div class="d-flex align-items-center gap-2 cursor-pointer me-4"
                 data-bs-toggle="dropdown">

                <img src="{{ Auth::user()->status->avatar == 'default-avatar.png'
                    ? asset('images/default-avatar.png')
                    : asset('storage/' . Auth::user()->status->avatar) }} "
                     class="rounded-circle cursor-pointer"
                     width="32"
                     height="32">

                <div class="d-none d-md-block" style="margin-top: -1em">
                    <div class="fw-semibold" style="font-size: 13px;">
                        {{ auth()->user()->username ?? 'username' }}
                    </div>

                    @if(auth()->user()->status->status == 'Active')
                        <div class="badge bg-success border-0 px-1 py-1 rounded-pill" style="font-size: 10px;">
                        {{ auth()->user()->status->status ?? 'status' }}
                        </div>
                    @else
                        <div class="badge bg-secondary border-0 px-1 py-1 rounded-pill" style="font-size: 10px;">
                        {{ auth()->user()->status->status ?? 'status' }}
                        </div>
                    @endif
            
                </div>

            </div>

            <!-- MENU -->
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                <li>
                    <a class="dropdown-item" href="/profile">
                        <x-heroicon-o-user style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                        Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="https://wa.me/6281212790459">
                        <x-heroicon-o-chat-bubble-bottom-center-text style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                        Help Center
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <x-heroicon-o-arrow-right-start-on-rectangle style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" class="icon" />
                            Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</nav>