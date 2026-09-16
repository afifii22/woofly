@extends('layouts.app')

@section('content')

<div class="woofly-detail-page">

    {{-- KEMBALI KE KATALOG --}}
    <div class="woofly-detail-top">
        <a href="{{ route('anabul.index') }}" class="woofly-back-catalog">
            ← &nbsp; Back to Catalog
        </a>
    </div>

    {{-- CONTENT --}}
    <div class="woofly-detail-container">

        {{-- FOTO --}}
        <div class="woofly-detail-left">

            {{-- Foto utama --}}
            <div class="woofly-detail-image">

                @if ($anabul->foto)
                    <img
                        src="{{ asset('images/' . $anabul->foto) }}"
                        alt="{{ $anabul->nama }}"
                    >
                @else
                    <div class="woofly-detail-no-image">
                        No Image Available
                    </div>
                @endif

                <span class="woofly-detail-status">
                    ● {{ $anabul->status_ketersediaan }}
                </span>

            </div>

            {{-- 3 Foto kecil --}}
            @if ($anabul->foto)
                <div class="woofly-detail-thumbnails">

                    <div class="woofly-detail-thumbnail active">
                        <img
                            src="{{ asset('images/' . $anabul->foto) }}"
                            alt="{{ $anabul->nama }}"
                        >
                    </div>

                    <div class="woofly-detail-thumbnail">
                        <img
                            src="{{ asset('images/' . $anabul->foto) }}"
                            alt="{{ $anabul->nama }}"
                        >
                    </div>

                    <div class="woofly-detail-thumbnail">
                        <img
                            src="{{ asset('images/' . $anabul->foto) }}"
                            alt="{{ $anabul->nama }}"
                        >
                    </div>

                </div>
            @endif

        </div>


        {{-- INFORMASI --}}
        <div class="woofly-detail-right">

            <div class="woofly-detail-breed">
                {{ strtoupper($anabul->ras) }}
            </div>

            <h1>{{ $anabul->nama }}</h1>

            <div class="woofly-detail-price">
                Rp {{ number_format($anabul->harga, 0, ',', '.') }}
            </div>


            {{-- DETAIL BOX --}}
            <div class="woofly-detail-info-box">

                <div>
                    <span>BREED</span>
                    <strong>{{ $anabul->ras }}</strong>
                </div>

                <div>
                    <span>GENDER</span>
                    <strong>{{ $anabul->jenis_kelamin }}</strong>
                </div>

                <div>
                    <span>AGE</span>
                    <strong>{{ $anabul->umur }} bulan</strong>
                </div>

                <div>
                    <span>COLOR</span>
                    <strong>{{ $anabul->warna }}</strong>
                </div>

                

                <div>
                    <span>STATUS</span>
                    <strong class="woofly-detail-available">
                        ● {{ $anabul->status_ketersediaan }}
                    </strong>
                </div>

            </div>


            {{-- TENTANG --}}
            <div class="woofly-detail-about">

                <h2>Tentang {{ $anabul->nama }}</h2>

                <p>
                    {{ $anabul->kondisi }}
                </p>

            </div>

            {{-- SUDAH TERMASUK --}}
            <div class="woofly-detail-included">

            <h3>SUDAH TERMASUK</h3>

            <div class="woofly-included-list">
                <div>
                    <span class="included-check">✓</span>
                    <span>Pemeriksaan kesehatan awal</span>
                </div>

                <div>
                    <span class="included-check">✓</span>
                    <span>Vaksinasi pertama</span>
                </div>

                <div>
                    <span class="included-check">✓</span>
                    <span>Sertifikat kelahiran</span>
                </div>

                <div>
                    <span class="included-check">✓</span>
                    <span>Kit perawatan starter</span>
                </div>
            </div>

        </div>


            {{-- BUTTON PESAN --}}
            @if ($anabul->status_ketersediaan == 'Tersedia')

                @auth

                    @if (auth()->user()->role === 'customer')
                        <a
                            href="{{ route('order.create', ['anabul_id' => $anabul->id]) }}"
                            class="woofly-order-button"
                        >
                            PESAN SEKARANG
                        </a>
                    @endif

                @else

                    <a
                        href="{{ route('login') }}"
                        class="woofly-order-button"
                    >
                        PESAN SEKARANG
                    </a>

                @endauth

            @endif

        </div>

    </div>

</div>

@endsection