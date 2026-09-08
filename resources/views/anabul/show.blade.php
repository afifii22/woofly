@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row g-5 align-items-start">

        {{-- FOTO ANABUL --}}
        <div class="col-md-6">

            @if ($anabul->foto)
                <img src="{{ asset('storage/' . $anabul->foto) }}"
                     alt="{{ $anabul->nama }}"
                     class="img-fluid rounded-4 shadow-sm w-100"
                     style="height: 450px; object-fit: cover;">
            @endif

        </div>


        {{-- DETAIL ANABUL --}}
        <div class="col-md-6">

            <h1 class="fw-bold mb-4">
                {{ $anabul->nama }}
            </h1>

            <div class="mb-4">

                <div class="row mb-3">
                    <div class="col-5 text-muted">Ras</div>
                    <div class="col-7 fw-semibold">
                        {{ $anabul->ras }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 text-muted">Jenis Kelamin</div>
                    <div class="col-7 fw-semibold">
                        {{ $anabul->jenis_kelamin }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 text-muted">Umur</div>
                    <div class="col-7 fw-semibold">
                        {{ $anabul->umur }} bulan
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 text-muted">Warna</div>
                    <div class="col-7 fw-semibold">
                        {{ $anabul->warna }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 text-muted">Harga</div>
                    <div class="col-7 fw-bold">
                        Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 text-muted">Kondisi</div>
                    <div class="col-7 fw-semibold">
                        {{ $anabul->kondisi }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 text-muted">Status</div>
                    <div class="col-7">
                        <span class="badge bg-secondary">
                            {{ $anabul->status_ketersediaan }}
                        </span>
                    </div>
                </div>

            </div>


            {{-- PESAN SEKARANG - CUSTOMER --}}
            @if (Auth::check() && Auth::user()->role === 'customer')

                @if ($anabul->status_ketersediaan === 'tersedia')
                    <a href="{{ route('order.create', ['anabul_id' => $anabul->id]) }}"
                       class="btn woofly-register px-4">
                        Pesan Sekarang
                    </a>
                @endif

            @endif


            {{-- KEMBALI KE KATALOG --}}
            <div class="mt-4">
                <a href="{{ route('anabul.index') }}"
                   class="btn btn-outline-secondary">
                    ← Kembali ke Katalog
                </a>
            </div>


            {{-- PUBLIC / CUSTOMER / OWNER --}}
            <div class="mt-3">

                @if (!Auth::check())
                    {{-- Guest --}}
                    <a href="{{ route('login') }}"
                       class="btn woofly-register">
                        Pesan
                    </a>

                @elseif (Auth::user()->role === 'customer')
                    {{-- Customer --}}
                    <a href="{{ route('order.create', ['anabul_id' => $anabul->id]) }}"
                       class="btn woofly-register">
                        Pesan
                    </a>

                @elseif (Auth::user()->role === 'owner')
                    {{-- Owner: tidak menampilkan tombol Pesan --}}
                @endif

            </div>

        </div>

    </div>

</div>

@endsection