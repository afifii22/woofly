<!DOCTYPE html>
<html>
<head>
    <title>WOOFLY - Home</title>
</head>
<body>

    <nav>
        <a href="{{ url('/') }}">WOOFLY</a>

        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/anabul') }}">Katalog</a>

        @auth
            {{-- <a href="{{ url('/order') }}">Pesanan Saya</a> --}}
            @if (Auth::user()->role === 'customer')
                <a href="{{ route('order.index') }}">Pesanan Saya</a>
            @endif
            @if (Auth::user()->role === 'owner')
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @endif

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>

    <hr>

    <main>
        <h1>Selamat Datang di WOOFLY</h1>

        <p>Temukan anabul terbaik untuk menjadi temanmu.</p>

        <a href="{{ url('/anabul') }}">Lihat Katalog</a>
    </main>

</body>
</html>