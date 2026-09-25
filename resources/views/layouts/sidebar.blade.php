<aside class="owner-sidebar" id="ownerSidebar">

    {{-- BRAND --}}
    <div class="owner-sidebar-brand">
        <span class="owner-sidebar-logo">W</span>

        <span class="owner-sidebar-brand-name">
            WOOFLY
        </span>
    </div>


    {{-- MENU --}}
    <nav class="owner-sidebar-menu">

        {{-- Dashboard --}}
        <a href="{{ route('owner.dashboard') }}"
           class="owner-sidebar-link {{ request()->routeIs('owner.dashboard') ? 'active' : '' }}">

            <i class="fa-solid fa-chart-line"></i>

            <span>Dashboard</span>
        </a>


        {{-- Kelola Anabul --}}
        <a href="{{ route('owner.anabul.index') }}"
           class="owner-sidebar-link {{ request()->routeIs('owner.anabul.*') ? 'active' : '' }}">

            <i class="fa-solid fa-paw"></i>

            <span>Kelola Data Anabul</span>
        </a>


        {{-- Customer --}}
        <a href="#"
           class="owner-sidebar-link">

            <i class="fa-solid fa-users"></i>

            <span>Kelola Data Customer</span>
        </a>


        {{-- Pesanan --}}
        <a href="#"
           class="owner-sidebar-link">

            <i class="fa-solid fa-receipt"></i>

            <span>Kelola Pesanan</span>
        </a>


        {{-- Divider --}}
        <div class="owner-sidebar-divider"></div>


        {{-- Back to Home --}}
        <a href="{{ url('/') }}"
           class="owner-sidebar-link owner-back-home">

            <i class="fa-solid fa-arrow-left"></i>

            <span>Back To Home</span>
        </a>

    </nav>


    {{-- Dekorasi bawah --}}
    <div class="owner-sidebar-decoration">
        <i class="fa-solid fa-paw"></i>
    </div>

</aside>