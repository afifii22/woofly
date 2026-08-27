<!DOCTYPE html>
<html>
<head>
    <title>{{ $anabul->nama }} - WOOFLY</title>
</head>
<body>

    <nav>
        <a href="{{ url('/') }}">WOOFLY</a>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('anabul.index') }}">Katalog</a>

        @auth
            @if (Auth::user()->role === 'customer')
                <a href="{{ route('order.index') }}">Pesanan Saya</a>
            @endif

            @if (Auth::user()->role === 'owner')
                <a href="{{ route('owner.dashboard') }}">Dashboard</a>
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

    <h1>{{ $anabul->nama }}</h1>

    @if ($anabul->foto)
        <img src="{{ asset('storage/' . $anabul->foto) }}"
             alt="{{ $anabul->nama }}"
             width="300">
    @endif

    <p>Ras: {{ $anabul->ras }}</p>
    <p>Jenis Kelamin: {{ $anabul->jenis_kelamin }}</p>
    <p>Umur: {{ $anabul->umur }} bulan</p>
    <p>Warna: {{ $anabul->warna }}</p>

    <p>
        Harga:
        Rp {{ number_format($anabul->harga, 0, ',', '.') }}
    </p>

    <p>Kondisi: {{ $anabul->kondisi }}</p>

    <p>
        Status:
        {{ $anabul->status_ketersediaan }}
    </p>

    <br>

    @if (Auth::check() && Auth::user()->role === 'customer')

        @if ($anabul->status_ketersediaan === 'tersedia')
            <a href="{{ route('order.create', ['anabul_id' => $anabul->id]) }}">
                Pesan Sekarang
            </a>
        @endif

    @elseif (!Auth::check())

        <a href="{{ route('login') }}">
            Login untuk Memesan
        </a>

    @endif

    <br><br>

    <a href="{{ route('anabul.index') }}">← Kembali ke Katalog</a>

</body>
</html>