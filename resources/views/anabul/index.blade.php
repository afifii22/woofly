<!DOCTYPE html>
<html>
<head>
    <title>Katalog Anabul - WOOFLY</title>
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

    <h1>Katalog Anabul</h1>

    @if ($anabuls->count())

        @foreach ($anabuls as $anabul)

            <div>
                @if ($anabul->foto)
                    <img src="{{ asset('storage/' . $anabul->foto) }}"
                         alt="{{ $anabul->nama }}"
                         width="200">
                @endif

                <h2>{{ $anabul->nama }}</h2>

                <p>Ras: {{ $anabul->ras }}</p>
                <p>Jenis Kelamin: {{ $anabul->jenis_kelamin }}</p>
                <p>Umur: {{ $anabul->umur }} bulan</p>
                <p>Warna: {{ $anabul->warna }}</p>

                <p>
                    Harga:
                    Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                </p>

                <p>
                    Status:
                    {{ $anabul->status_ketersediaan }}
                </p>

                <a href="{{ route('anabul.show', $anabul->id) }}">
                    Lihat Detail
                </a>
            </div>

            <hr>

        @endforeach

    @else
        <p>Belum ada anabul yang tersedia.</p>
    @endif

</body>
</html>