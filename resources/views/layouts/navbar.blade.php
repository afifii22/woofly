<nav class="navbar navbar-expand-lg woofly-navbar">
    <div class="container">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="woofly-logo text-decoration-none">
            <span class="logo-circle">W</span>
            <span>Woofly</span>
        </a>

        {{-- Tombol mobile --}}
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#wooflyNavbar"
                aria-controls="wooflyNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="wooflyNavbar">

            {{-- Menu --}}
            <ul class="navbar-nav mx-auto woofly-menu">
                <li class="nav-item">
                    <a href="{{ url('/') }}"
                       class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('anabul.index') }}"
                       class="nav-link {{ request()->is('anabul*') ? 'active' : '' }}">
                        Catalog
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}"
                       class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>
            </ul>

            {{-- Bagian kanan --}}
            <div class="woofly-right">

                {{-- Search --}}
                <a href="#" class="woofly-search text-decoration-none" title="Search">
                    <span>⌕</span>
                </a>

                <span class="nav-divider"></span>

                @guest
                    <a href="{{ route('login') }}"
                       class="woofly-login text-decoration-none">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="woofly-register text-decoration-none">
                        Register
                    </a>

                @else

                    <div class="dropdown">
                        <button class="woofly-account dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                            👤 {{ Auth::user()->nama }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            @if (Auth::user()->role === 'owner')

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('owner.dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('owner.profile') }}">
                                        Ubah Profil
                                    </a>
                                </li>

                            @elseif (Auth::user()->role === 'customer')

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('customer.profile') }}">
                                        Ubah Profil
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('order.index') }}">
                                        Pesanan Saya
                                    </a>
                                </li>

                            @endif

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>

                @endguest

            </div>
        </div>
    </div>
</nav>