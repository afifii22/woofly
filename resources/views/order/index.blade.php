<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Saya - WOOFLY</title>
</head>
<body>

    @include('layouts.navbar')

    <h1>Pesanan Saya</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($orders->isEmpty())
        <p>Belum ada pesanan.</p>
    @else

        @foreach ($orders as $order)

            <hr>

            <h2>{{ $order->anabul->nama }}</h2>

            <p>
                Harga:
                Rp {{ number_format($order->anabul->harga, 0, ',', '.') }}
            </p>

            <p>
                Metode Pembelian:
                {{ $order->metode_pembelian }}
            </p>

            <p>
                Metode Pembayaran:
                {{ $order->metode_pembayaran }}
            </p>

            <p>
                Status:
                <strong>{{ $order->status_pesanan }}</strong>
            </p>

            <a href="{{ route('order.show', $order->id) }}">
                Lihat Detail
            </a>

        @endforeach

    @endif

    <br><br>

    <a href="{{ route('anabul.index') }}">
        Kembali ke Katalog
    </a>

</body>
</html>