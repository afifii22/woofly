<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan - WOOFLY</title>
</head>
<body>

    @include('layouts.navbar')

    <h1>Detail Pesanan</h1>

    <hr>

    <h2>Data Anabul</h2>

    <p>
        Nama:
        {{ $order->anabul->nama }}
    </p>

    <p>
        Ras:
        {{ $order->anabul->ras }}
    </p>

    <p>
        Jenis Kelamin:
        {{ $order->anabul->jenis_kelamin }}
    </p>

    <p>
        Harga:
        Rp {{ number_format($order->anabul->harga, 0, ',', '.') }}
    </p>

    <hr>

    <h2>Detail Pemesanan</h2>

    <p>
        No. HP:
        {{ $order->no_hp }}
    </p>

    <p>
        Metode Pembelian:
        {{ $order->metode_pembelian }}
    </p>

    @if ($order->metode_pembelian === 'Diantar')

        <p>
            Alamat Pengiriman:
            {{ $order->alamat_pengiriman }}
        </p>

    @elseif ($order->metode_pembelian === 'Diambil')

        <p>
            Tanggal Pengambilan:
            {{ $order->tanggal_pengambilan }}
        </p>

        <p>
            Waktu Pengambilan:
            {{ $order->waktu_pengambilan }}
        </p>

    @endif

    <p>
        Metode Pembayaran:
        {{ $order->metode_pembayaran }}
    </p>

    @if ($order->metode_pembayaran === 'Transfer Bank' && $order->bukti_pembayaran)

        <p>
            Bukti Transfer:
        </p>

        <img
            src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
            width="300"
            alt="Bukti Transfer"
        >

    @elseif ($order->metode_pembayaran === 'COD')

        <p>
            ⚠️ Pembayaran dilakukan secara tunai.
        </p>

    @endif

    <p>
        Catatan:
        {{ $order->catatan ?: '-' }}
    </p>

    <p>
        Status Pesanan:
        <strong>{{ $order->status_pesanan }}</strong>
    </p>

    @if ($order->status_pesanan === 'Menunggu Konfirmasi')
    <form action="{{ route('order.cancel', $order->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
        @csrf
        @method('PATCH')

        <button type="submit">
            Batalkan Pesanan
        </button>
    </form>
    @endif

    <p>
        Tanggal Pemesanan:
        {{ $order->created_at->format('d-m-Y H:i') }}
    </p>

    <br>

    <a href="{{ route('order.index') }}">
        Kembali ke Pesanan Saya
    </a>

</body>
</html>