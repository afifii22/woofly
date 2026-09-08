@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- Judul --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold">Pesanan Saya</h1>
        <p class="text-muted">
            Lihat dan pantau pesanan anabul kamu.
        </p>
    </div>


    {{-- Pesan berhasil --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if ($orders->isEmpty())

        {{-- Belum ada pesanan --}}
        <div class="text-center py-5">

            <div class="fs-1 mb-3">
                🐶
            </div>

            <h4 class="fw-bold">
                Belum ada pesanan
            </h4>

            <p class="text-muted">
                Kamu belum memiliki pesanan anabul.
            </p>

            <a href="{{ route('anabul.index') }}"
               class="btn woofly-register mt-2">
                Lihat Katalog
            </a>

        </div>

    @else

        {{-- Daftar Pesanan --}}
        <div class="row g-4">

            @foreach ($orders as $order)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                            <h4 class="fw-bold mb-3">
                                {{ $order->anabul->nama }}
                            </h4>


                            <p class="mb-2">
                                <span class="text-muted">
                                    Harga
                                </span>
                                <br>
                                <strong>
                                    Rp {{ number_format($order->anabul->harga, 0, ',', '.') }}
                                </strong>
                            </p>


                            <p class="mb-2">
                                <span class="text-muted">
                                    Metode Pembelian
                                </span>
                                <br>
                                <strong>
                                    {{ $order->metode_pembelian }}
                                </strong>
                            </p>


                            <p class="mb-2">
                                <span class="text-muted">
                                    Metode Pembayaran
                                </span>
                                <br>
                                <strong>
                                    {{ $order->metode_pembayaran }}
                                </strong>
                            </p>


                            <p class="mb-4">
                                <span class="text-muted">
                                    Status
                                </span>
                                <br>

                                <span class="badge bg-secondary">
                                    {{ $order->status_pesanan }}
                                </span>
                            </p>


                            <a href="{{ route('order.show', $order->id) }}"
                               class="btn woofly-register w-100">
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif


    {{-- Kembali ke katalog --}}
    <div class="text-center mt-5">

        <a href="{{ route('anabul.index') }}"
           class="text-decoration-none text-muted">
            ← Kembali ke Katalog
        </a>

    </div>

</div>

@endsection