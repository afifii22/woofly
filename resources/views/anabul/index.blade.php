@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="woofly-catalog-page">

        <h1>
            @if ($search)
                Search Results
            @else
                Our Dogs
            @endif
        </h1>

        <p>
            @if ($search)
                Showing dogs with breed "{{ $search }}".
            @else
                Find your perfect new companion.
            @endif
        </p>

    </div>


    {{-- Card Anabul --}}
    <div class="woofly-catalog-container">

        @if ($anabuls->count())

            <div class="woofly-dog-grid">

                @foreach ($anabuls as $anabul)

                    <div class="woofly-dog-card">

                        {{-- Foto --}}
                        <div class="woofly-dog-image">

                            @if ($anabul->foto)

                                <img
                                    src="{{ asset('images/' . $anabul->foto) }}"
                                    alt="{{ $anabul->nama }}"
                                >

                            @else

                                <div class="woofly-no-image">
                                    No Image Available
                                </div>

                            @endif

                        </div>


                        {{-- Informasi --}}
                        <div class="woofly-dog-info">

                            {{-- Nama + Status --}}
                            <div class="woofly-dog-title">

                                <h2>
                                    {{ $anabul->nama }}
                                </h2>

                                <span class="woofly-status">
                                    {{ $anabul->status_ketersediaan }}
                                </span>

                            </div>


                            {{-- Ras --}}
                            <p class="woofly-dog-breed">
                                {{ $anabul->ras }}
                            </p>


                            {{-- Detail --}}
                            <div class="woofly-dog-details">

                                <div>
                                    <span>GENDER</span>
                                    <strong>
                                        {{ $anabul->jenis_kelamin }}
                                    </strong>
                                </div>

                                <div>
                                    <span>AGE</span>
                                    <strong>
                                        {{ $anabul->umur }}
                                    </strong>
                                </div>

                                <div>
                                    <span>COLOR</span>
                                    <strong>
                                        {{ $anabul->warna }}
                                    </strong>
                                </div>

                            </div>


                            {{-- Harga + Button --}}
                            <div class="woofly-dog-bottom">

                                <div class="woofly-price">

                                    <span>PRICE</span>

                                    <strong>
                                        Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                                    </strong>

                                </div>

                                <a
                                    href="{{ route('anabul.show', $anabul->id) }}"
                                    class="woofly-detail-button"
                                >
                                    View Details
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- Tidak ada hasil --}}
            <div class="woofly-empty">

                @if ($search)

                    <h3>
                        No Dogs Found
                    </h3>

                    <p>
                        No dogs found for breed "{{ $search }}".
                    </p>

                    <a
                        href="{{ route('anabul.index') }}"
                        class="woofly-detail-button"
                    >
                        View All Dogs
                    </a>

                @else

                    <p>
                        No dogs available.
                    </p>

                @endif

            </div>

        @endif

    </div>

</div>

@endsection