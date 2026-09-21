@extends('layouts.app')

@section('content')

<div class="woofly-order-detail-page">

    <div class="container-fluid px-4 px-lg-5">

        {{-- KEMBALI --}}
        <div class="woofly-detail-back">
            <a href="{{ route('order.index') }}">
                &lt;- Kembali ke Pesanan Saya
            </a>
        </div>


        {{-- JUDUL --}}
        <div class="woofly-detail-header">

            <h1>
                Detail Pesanan
            </h1>

            <p>
                Informasi lengkap pesanan anabul kamu.
            </p>

        </div>


        {{-- =========================
             DATA ANABUL
        ========================== --}}

        <div class="woofly-detail-anabul">

            <div class="woofly-detail-anabul-main">

                {{-- FOTO --}}
                <div class="woofly-detail-order-image">

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


                {{-- NAMA --}}
                <div class="woofly-detail-anabul-info">

                    <h2>
                        {{ $order->anabul->nama }}
                    </h2>

                    <p>
                        {{ $order->anabul->ras }}
                    </p>

                </div>


                {{-- STATUS + HARGA --}}
                <div class="woofly-detail-anabul-price">

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

                    <span class="woofly-order-status {{ $statusClass }}">
                        {{ $order->status_pesanan }}
                    </span>

                    <strong>
                        Rp {{ number_format($order->anabul->harga, 0, ',', '.') }}
                    </strong>

                </div>

            </div>


            {{-- NOMOR + TANGGAL --}}
            <div class="woofly-detail-anabul-bottom">

                <div>
                    <span>No. Pesanan</span>
                    <strong>
                        #WF{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}
                    </strong>
                </div>

                <div>
                    <span>Tanggal Pesan</span>
                    <strong>
                        {{ $order->created_at->format('d M Y, H:i') }}
                    </strong>
                </div>

            </div>

        </div>


        {{-- =========================
             INFORMASI PEMESAN
        ========================== --}}

        <div class="woofly-detail-box">

            <div class="woofly-detail-box-title">

                <i class="fa-solid fa-user"></i>

                <h2>
                    Informasi Pemesan
                </h2>

            </div>


            <div class="woofly-detail-row">

                <span>
                    Nama Lengkap
                </span>

                <strong>
                    {{ $order->customer->nama ?? Auth::user()->nama }}
                </strong>

            </div>


            <div class="woofly-detail-row">

                <span>
                    Nomor Telepon
                </span>

                <strong>
                    {{ $order->no_hp }}
                </strong>

            </div>


            <div class="woofly-detail-row">

                <span>
                    Email
                </span>

                <strong>
                    {{ $order->customer->email ?? Auth::user()->email }}
                </strong>

            </div>

        </div>


        {{-- =========================
             INFORMASI PENGAMBILAN / PENGIRIMAN
        ========================== --}}

        <div class="woofly-detail-box">

            <div class="woofly-detail-box-title">

                @if ($order->metode_pembelian === 'Diantar')

                    <i class="fa-solid fa-truck"></i>

                @else

                    <i class="fa-solid fa-store"></i>

                @endif

                <h2>
                    Informasi Pengambilan / Pengiriman
                </h2>

            </div>


            <div class="woofly-detail-row">

                <span>
                    Metode
                </span>

                <strong>
                    {{ $order->metode_pembelian }}
                </strong>

            </div>


            @if ($order->metode_pembelian === 'Diantar')

                <div class="woofly-detail-row">

                    <span>
                        Alamat Pengiriman
                    </span>

                    <strong>
                        {{ $order->alamat_pengiriman }}
                    </strong>

                </div>


                @if ($order->estimasi_pengiriman)

                    <div class="woofly-detail-row">

                        <span>
                            Estimasi Pengiriman
                        </span>

                        <strong>
                            {{ $order->estimasi_pengiriman }}
                        </strong>

                    </div>

                @endif

            @elseif ($order->metode_pembelian === 'Diambil')

                <div class="woofly-detail-row">

                    <span>
                        Tanggal Pengambilan
                    </span>

                    <strong>
                        {{ $order->tanggal_pengambilan }}
                    </strong>

                </div>


                <div class="woofly-detail-row">

                    <span>
                        Waktu Pengambilan
                    </span>

                    <strong>
                        {{ $order->waktu_pengambilan }}
                    </strong>

                </div>

            @endif

        </div>


        {{-- =========================
             INFORMASI PEMBAYARAN
        ========================== --}}

        <div class="woofly-detail-box">

            <div class="woofly-detail-box-title">

                <i class="fa-regular fa-credit-card"></i>

                <h2>
                    Informasi Pembayaran
                </h2>

            </div>


            <div class="woofly-detail-row">

                <span>
                    Metode Pembayaran
                </span>

                <strong>
                    {{ $order->metode_pembayaran }}
                </strong>

            </div>


            @if ($order->metode_pembayaran === 'Transfer Bank')

                <div class="woofly-detail-row">

                    <span>
                        No. Rekening Tujuan
                    </span>

                    <strong>
                        BCA - 1234 5678 9012
                    </strong>

                </div>


                @if ($order->bukti_pembayaran)

                    <div class="woofly-detail-row">

                        <span>
                            Bukti Pembayaran
                        </span>

                        <strong>
                            {{ basename($order->bukti_pembayaran) }}
                        </strong>

                    </div>

                @endif

            @elseif ($order->metode_pembayaran === 'COD')

                <div class="woofly-cod-info">

                    <i class="fa-solid fa-money-bill-wave"></i>

                    <div>

                        <strong>
                            Pembayaran COD
                        </strong>

                        <p>
                            Pembayaran dilakukan secara tunai saat anabul diterima
                            atau diambil.
                        </p>

                    </div>

                </div>

            @endif

        </div>


        {{-- =========================
             CATATAN
        ========================== --}}

        @if ($order->catatan)

            <div class="woofly-detail-box">

                <div class="woofly-detail-box-title">

                    <i class="fa-regular fa-note-sticky"></i>

                    <h2>
                        Catatan Pesanan
                    </h2>

                </div>

                <div class="woofly-detail-note">
                    {{ $order->catatan }}
                </div>

            </div>

        @endif


        {{-- =========================
             STATUS PESANAN
        ========================== --}}

        <div class="woofly-status-box">

            <h2>
                Status Pesanan
            </h2>


            @php

                $status = $order->status_pesanan;

                $steps = [
                    'Dibuat',
                    'Menunggu Konfirmasi',
                    'Dikonfirmasi',
                    'Selesai'
                ];

                if ($status === 'Dibatalkan' || $status === 'Ditolak') {
                    $currentStep = 2;
                } elseif ($status === 'Menunggu Konfirmasi') {
                    $currentStep = 2;
                } elseif ($status === 'Dikonfirmasi') {
                    $currentStep = 3;
                } elseif ($status === 'Selesai') {
                    $currentStep = 4;
                } else {
                    $currentStep = 1;
                }

            @endphp


            <div class="woofly-status-timeline">

                @foreach ($steps as $index => $step)

                    @php
                        $stepNumber = $index + 1;

                        if ($stepNumber < $currentStep) {
                            $stepClass = 'done';
                        } elseif ($stepNumber === $currentStep) {
                            $stepClass = 'active';
                        } else {
                            $stepClass = 'upcoming';
                        }
                    @endphp

                    <div class="woofly-status-step {{ $stepClass }}">

                        <div class="woofly-status-circle">
                            {{ $stepNumber }}
                        </div>

                        <strong>
                            {{ $step }}
                        </strong>

                        @if ($stepNumber === 1)

                            <small>
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </small>

                        @endif

                    </div>

                @endforeach

            </div>


            {{-- STATUS DIBATALKAN / DITOLAK --}}
            @if ($status === 'Dibatalkan' || $status === 'Ditolak')

                <div class="woofly-cancelled-status">

                    Status pesanan:
                    <strong>{{ $status }}</strong>

                    @if ($order->alasan_pembatalan)

                        <span>
                            {{ $order->alasan_pembatalan }}
                        </span>

                    @endif

                </div>

            @endif


            {{-- BATALKAN PESANAN --}}
            @if ($order->status_pesanan === 'Menunggu Konfirmasi')

                <form
                    action="{{ route('order.cancel', $order->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')"
                    class="woofly-cancel-form"
                >

                    @csrf
                    @method('PATCH')

                    <button type="submit">
                        Batalkan Pesanan
                    </button>

                </form>

            @endif

        </div>


    </div>

</div>

@endsection