<!DOCTYPE html>
<html>
<head>
    <title>Katalog Anabul - WOOFLY</title>
</head>
<body>

    @include('layouts.navbar')


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