@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="woofly-catalog-page">
        <h1>Our Dogs</h1>
        <p>Find your perfect new companion.</p>
    </div>

    {{-- Card Anabul--}}
    <div class="woofly-catalog-container">
        @if ($anabuls->count())

            <div class="woofly-dog-grid">
                @foreach ($anabuls as $anabul)
                    <div class="woofly-dog-card">
                        {{-- Foto --}}
                        <div class="woofly-dog-image">
                            @if ($anabul->foto)
                                <img src="{{ asset('images/' . $anabul->foto) }}" alt="{{ $anabul->nama }}">
                            @else
                                <div class="woofly-no-image">
                                    No Image Available
                                </div>                             
                            @endif
                        </div>

                        {{-- Informasi --}}
                        <div class="woofly-dog-info">
                            {{-- nama + status --}}
                            <div class="woofly-dog-title">
                                <h2>{{ $anabul->nama }}</h2>
                                <span class="woofly-status">{{ $anabul->status_ketersediaan }}</span>
                            </div>
                            {{-- ras --}}
                            <p class="woofly-dog-breed">
                                {{ $anabul->ras }}
                            </p>
                            {{-- detail --}}
                            <div class="woofly-dog-details">
                                <div>
                                    <span>GENDER</span>
                                    <strong>{{ $anabul->jenis_kelamin }}</strong>
                                </div>
                                <div>
                                    <span>AGE</span>
                                    <strong>{{ $anabul->umur }}</strong>
                                </div>
                                <div>
                                    <span>COLOR</span>
                                    <strong>{{ $anabul->warna }}</strong>
                                </div>
                            </div>

                            {{-- harga + button --}}
                            <div class="woofly-dog-bottom">
                                <div class="woofly-price">
                                    <span>PRICE</span>
                                    <strong>Rp {{ number_format($anabul->harga, 0, ',', '.') }}</strong>
                                </div>
                                <a href="{{ route('anabul.show', $anabul->id) }}" class="woofly-detail-button">
                                    View Details
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

        @else
            <div class="woofly-empty">
                <p>No dogs available.</p>
            </div>
            
        @endif
    </div>

@endsection