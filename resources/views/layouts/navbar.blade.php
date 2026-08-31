<nav>
    <a href="{{ url('/') }}">WOOFLY</a>

    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('anabul.index') }}">Catalog</a>
    <a href="{{ route('contact') }}">Contact</a>
    <a href="#">🔍</a>

    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @else

        <details>
            <summary>👤 {{ Auth::user()->nama }}</summary>

            @if (Auth::user()->role === 'owner')

                <a href="{{ route('owner.dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('owner.profile') }}">
                    Ubah Profil
                </a>

            @elseif (Auth::user()->role === 'customer')

                <a href="{{ route('customer.profile') }}">
                    Ubah Profil
                </a>

                <a href="{{ route('order.index') }}">
                    Pesanan Saya
                </a>

            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>

        </details>

    @endguest
</nav>