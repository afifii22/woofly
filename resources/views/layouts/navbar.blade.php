{{-- ============================================================ --}}
{{-- NAVBAR --}}
{{-- ============================================================ --}}

<nav class="navbar navbar-expand-lg woofly-nav">

    <div class="woofly-nav-inner d-flex align-items-center h-100">

        {{-- Brand --}}
        <a href="{{ url('/') }}"
           class="navbar-brand text-decoration-none">

            <span class="brand-mark">W</span>

            <span>WOOFLY</span>

        </a>


        {{-- Tombol Mobile --}}
        <button class="navbar-toggler d-md-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#wooflyNavbar"
                aria-controls="wooflyNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse"
             id="wooflyNavbar">


            {{-- Menu --}}
            <ul class="nav woofly-menu
                       d-none d-md-flex
                       align-items-center
                       gap-2
                       mb-0">

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
            <div class="woofly-right d-flex align-items-center gap-3">


                {{-- SEARCH --}}
                <div class="woofly-search-wrapper">

                    <button type="button"
                            class="nav-search-btn"
                            onclick="toggleSearch()"
                            aria-label="Search">

                        <i class="fa-solid fa-magnifying-glass"></i>

                    </button>


                    <form action="{{ route('anabul.index') }}"
                          method="GET"
                          class="woofly-search-form"
                          id="wooflySearchForm">

                        <input
                            type="text"
                            name="search"
                            placeholder="Cari jenis anabul..."
                            value="{{ request('search') }}"
                            autocomplete="off"
                        >

                        <button type="submit"
                                aria-label="Submit Search">

                            <i class="fa-solid fa-magnifying-glass"></i>

                        </button>

                    </form>

                </div>


                {{-- LOGIN / REGISTER --}}
                @guest

                    <a href="{{ route('login') }}"
                       class="nav-login text-decoration-none d-none d-sm-inline">

                        Login

                    </a>


                    <a href="{{ route('register') }}"
                       class="btn-register text-decoration-none">

                        Register

                    </a>


                @else

                    {{-- ACCOUNT --}}
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

                                <form action="{{ route('logout') }}"
                                      method="POST">

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