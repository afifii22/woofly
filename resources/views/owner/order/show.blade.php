<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan - WOOFLY</title>
</head>
<body>

    @include('layouts.owner-navbar')
    @include('layouts.sidebar')

    <main>

        <h1>Detail Pesanan</h1>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <h2>Informasi Customer</h2>

        <p>
            <strong>Nama:</strong>
            {{ $order->customer->nama ?? '-' }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $order->customer->email ?? '-' }}
        </p>

        <p>
            <strong>No. HP:</strong>
            {{ $order->no_hp }}
        </p>

        <hr>

        <h2>Informasi Anabul</h2>

        <p>
            <strong>Nama:</strong>
            {{ $order->anabul->nama ?? '-' }}
        </p>

        <p>
            <strong>Ras:</strong>
            {{ $order->anabul->ras ?? '-' }}
        </p>

        <p>
            <strong>Harga:</strong>
            Rp {{ number_format($order->anabul->harga ?? 0, 0, ',', '.') }}
        </p>

        <hr>

        <h2>Informasi Pesanan</h2>

        <p>
            <strong>Tanggal Pemesanan:</strong>
            {{ $order->tanggal_pemesanan ?? '-' }}
        </p>

        <p>
            <strong>Metode Pembelian:</strong>
            {{ $order->metode_pembelian }}
        </p>

        @if ($order->metode_pembelian === 'Diantar')
            <p>
                <strong>Alamat Pengiriman:</strong>
                {{ $order->alamat_pengiriman }}
            </p>
        @elseif ($order->metode_pembelian === 'Diambil')
            <p>
                <strong>Tanggal Pengambilan:</strong>
                {{ $order->tanggal_pengambilan ?? '-' }}
            </p>

            <p>
                <strong>Waktu Pengambilan:</strong>
                {{ $order->waktu_pengambilan ?? '-' }}
            </p>
        @endif

        <p>
            <strong>Metode Pembayaran:</strong>
            {{ $order->metode_pembayaran }}
        </p>

        @if ($order->metode_pembayaran === 'Transfer Bank')
            <p>
                <strong>Bukti Pembayaran:</strong>
                {{ $order->bukti_pembayaran ?? 'Belum ada' }}
            </p>
        @elseif ($order->metode_pembayaran === 'COD')
            <p>
                <strong>Pemberitahuan:</strong>
                Pembayaran dilakukan secara COD.
            </p>
        @endif

        <p>
            <strong>Catatan:</strong>
            {{ $order->catatan ?? '-' }}
        </p>

        <p>
            <strong>Status Pesanan:</strong>
            {{ $order->status_pesanan }}
        </p>

        <hr>

        <h2>Ubah Status Pesanan</h2>

        <form
            action="{{ route('owner.order.updateStatus', $order->id) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <select name="status_pesanan" required>
                <option value="Menunggu Konfirmasi"
                    {{ $order->status_pesanan === 'Menunggu Konfirmasi' ? 'selected' : '' }}>
                    Menunggu Konfirmasi
                </option>

                <option value="Dikonfirmasi"
                    {{ $order->status_pesanan === 'Dikonfirmasi' ? 'selected' : '' }}>
                    Dikonfirmasi
                </option>

                <option value="Diproses"
                    {{ $order->status_pesanan === 'Diproses' ? 'selected' : '' }}>
                    Diproses
                </option>

                <option value="Selesai"
                    {{ $order->status_pesanan === 'Selesai' ? 'selected' : '' }}>
                    Selesai
                </option>

                <option value="Ditolak"
                    {{ $order->status_pesanan === 'Ditolak' ? 'selected' : '' }}>
                    Ditolak
                </option>
            </select>

            <button type="submit">Simpan Status</button>
        </form>

        <br>

        <a href="{{ route('owner.order.index') }}">
            Kembali ke Daftar Pesanan
        </a>

    </main>

</body>
</html>