<!DOCTYPE html>
<html>
<head>
    <title>{{ $anabul->nama }} - WOOFLY</title>
</head>
<body>

    @include('layouts.navbar')


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
    @if (!Auth::check())
    {{-- Guest --}}
    <a href="{{ route('login') }}">Pesan</a>

@elseif (Auth::user()->role === 'customer')
    {{-- Customer --}}
    <a href="{{ route('order.create', ['anabul_id' => $anabul->id]) }}">
        Pesan
    </a>

@elseif (Auth::user()->role === 'owner')
    {{-- Owner: tidak menampilkan tombol Pesan --}}
@endif

</body>
</html>