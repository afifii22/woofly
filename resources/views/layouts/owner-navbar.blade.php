<nav class="owner-navbar">
    <div class="owner-navbar-left">
        <button type="button" class="owner-menu-toggle" id="ownerMenuToggle">
            <i class="fa-solid fa-bars"></i>
        </button>

        <h1 class="owner-page-title">
            @yield('owner-page-title', 'Dashboard Owner')
        </h1>
    </div>

    <div class="owner-navbar-right">

        {{-- Profile Dropdown --}}
        <div class="dropdown">

            <button
                class="owner-profile-btn dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <span class="owner-avatar">
                    {{ strtoupper(substr(auth()->user()->nama ?? 'O', 0, 1)) }}
                </span>

                <span class="owner-name">
                    {{ auth()->user()->nama ?? 'Owner' }}
                </span>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a class="dropdown-item" href="{{ route('owner.dashboard') }}">
                        <i class="fa-solid fa-chart-line me-2"></i>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('owner.profile') }}">
                        <i class="fa-regular fa-user me-2"></i>
                        Ubah Profil
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>
</nav>