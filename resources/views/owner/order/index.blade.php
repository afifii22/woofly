<!DOCTYPE html>
<html>
<head>
    <title>Kelola Pesanan - WOOFLY</title>
</head>
<body>

    @include('layouts.owner-navbar')
    @include('layouts.sidebar')

    <main>
        <h1>Kelola Data Pesanan</h1>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if ($orders->isEmpty())
            <p>Belum ada pesanan.</p>
        @else

            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Anabul</th>
                        <th>Metode Pembelian</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $order->customer->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $order->anabul->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $order->metode_pembelian }}
                            </td>

                            <td>
                                {{ $order->metode_pembayaran }}
                            </td>

                            <td>
                                {{ $order->status_pesanan }}
                            </td>

                            <td>
                                <a href="{{ route('owner.order.show', $order->id) }}">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

    </main>

</body>
</html>