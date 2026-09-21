@extends('layouts.app')

@section('content')

<div class="woofly-my-order-page">

    <div class="container-fluid px-4 px-lg-5">

        {{-- Judul --}}
        <div class="woofly-my-order-header">

            <h1>
                Pesanan Saya
            </h1>

            <p>
                Lihat dan pantau pesanan anabul kamu.
            </p>

        </div>


        {{-- Pesan berhasil --}}
        @if (session('success'))

            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>

        @endif


        @if ($orders->isEmpty())

            {{-- Belum ada pesanan --}}
            <div class="woofly-order-empty">

                <div class="woofly-empty-icon">
                    🐶
                </div>

                <h4>
                    Belum ada pesanan
                </h4>

                <p>
                    Kamu belum memiliki pesanan anabul.
                </p>

                <a
                    href="{{ route('anabul.index') }}"
                    class="woofly-empty-button"
                >
                    Lihat Katalog
                </a>

            </div>

        @else

            {{-- Daftar Pesanan --}}
            <div class="woofly-order-list">

                @foreach ($orders as $order)

                    @php

                        $statusClass = match ($order->status_pesanan) {

                            'Menunggu Konfirmasi' => 'waiting',

                            'Dikonfirmasi' => 'confirmed',

                            'Selesai' => 'completed',

                            'Dibatalkan' => 'cancelled',

                            'Ditolak' => 'rejected',

                            default => 'default',

                        };

                    @endphp


                    <div class="woofly-my-order-card">

                        {{-- FOTO ANABUL --}}
                        <div class="woofly-my-order-image">

                            @if ($order->anabul && $order->anabul->foto)

                                <img
                                    src="{{ asset('images/' . $order->anabul->foto) }}"
                                    alt="{{ $order->anabul->nama }}"
                                >

                            @else

                                <div class="woofly-order-no-image">
                                    No Image
                                </div>

                            @endif

                        </div>


                        {{-- INFORMASI PESANAN --}}
                        <div class="woofly-my-order-info">

                            <h2>
                                #WF{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}
                            </h2>

                            <h3>
                                {{ $order->anabul->nama }}
                            </h3>

                            <p class="woofly-my-order-breed">
                                {{ $order->anabul->ras }}
                            </p>


                            <div class="woofly-my-order-meta">

                                <span>
                                    {{ $order->created_at->format('d M Y') }}
                                </span>

                                <strong>
                                    Rp {{ number_format($order->anabul->harga, 0, ',', '.') }}
                                </strong>

                            </div>

                        </div>


                        {{-- STATUS + DETAIL --}}
                        <div class="woofly-my-order-right">

                            <span class="woofly-order-status {{ $statusClass }}">
                                {{ $order->status_pesanan }}
                            </span>


                            <a
                                href="{{ route('order.show', $order->id) }}"
                                class="woofly-order-detail-link"
                            >
                                Detail Pesanan ->
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif


        {{-- Kembali ke katalog --}}
        <div class="text-center mt-5">

            <a
                href="{{ route('anabul.index') }}"
                class="text-decoration-none text-muted"
            >
                ← Kembali ke Katalog
            </a>

        </div>

    </div>

</div>

@endsection