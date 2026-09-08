@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- Judul --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold">Detail Pesanan</h1>
        <p class="text-muted">
            Informasi lengkap pesanan anabul kamu.
        </p>
    </div>


    <div class="row g-4">

        {{-- DATA ANABUL --}}
        <div class="col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Data Anabul
                    </h4>

                    <div class="mb-3">
                        <span class="text-muted">Nama</span>
                        <div class="fw-semibold">
                            {{ $order->anabul->nama }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <span class="text-muted">Ras</span>
                        <div class="fw-semibold">
                            {{ $order->anabul->ras }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <span class="text-muted">Jenis Kelamin</span>
                        <div class="fw-semibold">
                            {{ $order->anabul->jenis_kelamin }}
                        </div>
                    </div>

                    <div>
                        <span class="text-muted">Harga</span>
                        <div class="fw-bold fs-5">
                            Rp {{ number_format($order->anabul->harga, 0, ',', '.') }}
                        </div>
                    </div>

                </div>

            </div>

        </div>


        {{-- DETAIL PEMESANAN --}}
        <div class="col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Detail Pemesanan
                    </h4>

                    <div class="mb-3">
                        <span class="text-muted">No. HP</span>
                        <div class="fw-semibold">
                            {{ $order->no_hp }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <span class="text-muted">Metode Pembelian</span>
                        <div class="fw-semibold">
                            {{ $order->metode_pembelian }}
                        </div>
                    </div>


                    @if ($order->metode_pembelian === 'Diantar')

                        <div class="mb-3">
                            <span class="text-muted">
                                Alamat Pengiriman
                            </span>

                            <div class="fw-semibold">
                                {{ $order->alamat_pengiriman }}
                            </div>
                        </div>

                    @elseif ($order->metode_pembelian === 'Diambil')

                        <div class="mb-3">
                            <span class="text-muted">
                                Tanggal Pengambilan
                            </span>

                            <div class="fw-semibold">
                                {{ $order->tanggal_pengambilan }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="text-muted">
                                Waktu Pengambilan
                            </span>

                            <div class="fw-semibold">
                                {{ $order->waktu_pengambilan }}
                            </div>
                        </div>

                    @endif


                    <div class="mb-3">
                        <span class="text-muted">
                            Metode Pembayaran
                        </span>

                        <div class="fw-semibold">
                            {{ $order->metode_pembayaran }}
                        </div>
                    </div>


                    @if ($order->metode_pembayaran === 'Transfer Bank' && $order->bukti_pembayaran)

                        <div class="mb-3">

                            <span class="text-muted d-block mb-2">
                                Bukti Transfer
                            </span>

                            <img
                                src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                class="img-fluid rounded-3"
                                style="max-width: 300px;"
                                alt="Bukti Transfer"
                            >

                        </div>

                    @elseif ($order->metode_pembayaran === 'COD')

                        <div class="alert alert-warning mt-3">
                            ⚠️ Pembayaran dilakukan secara tunai.
                        </div>

                    @endif


                    <div class="mb-3">
                        <span class="text-muted">
                            Catatan
                        </span>

                        <div class="fw-semibold">
                            {{ $order->catatan ?: '-' }}
                        </div>
                    </div>


                    <div class="mb-3">
                        <span class="text-muted">
                            Status Pesanan
                        </span>

                        <div class="mt-1">
                            <span class="badge bg-secondary">
                                {{ $order->status_pesanan }}
                            </span>
                        </div>
                    </div>


                    {{-- BATALKAN PESANAN --}}
                    @if ($order->status_pesanan === 'Menunggu Konfirmasi')

                        <form
                            action="{{ route('order.cancel', $order->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')"
                            class="mt-4"
                        >

                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                    class="btn btn-danger w-100">
                                Batalkan Pesanan
                            </button>

                        </form>

                    @endif


                    <div class="mt-4 pt-3 border-top">

                        <span class="text-muted">
                            Tanggal Pemesanan
                        </span>

                        <div class="fw-semibold">
                            {{ $order->created_at->format('d-m-Y H:i') }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- KEMBALI --}}
    <div class="text-center mt-5">

        <a href="{{ route('order.index') }}"
           class="text-decoration-none text-muted">
            ← Kembali ke Pesanan Saya
        </a>

    </div>

</div>

@endsection