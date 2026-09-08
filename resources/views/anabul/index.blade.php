@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- Judul --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold">Katalog Anabul</h1>
        <p class="text-muted">
            Temukan anabul terbaik untuk menjadi temanmu.
        </p>
    </div>

    @if ($anabuls->count())

        <div class="row g-4">

            @foreach ($anabuls as $anabul)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        {{-- Foto --}}
                        @if ($anabul->foto)
                            <img src="{{ asset('storage/' . $anabul->foto) }}"
                                 alt="{{ $anabul->nama }}"
                                 class="card-img-top"
                                 style="height: 260px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light"
                                 style="height: 260px;">
                                <span class="text-muted">Tidak ada foto</span>
                            </div>
                        @endif

                        {{-- Isi Card --}}
                        <div class="card-body">

                            <h4 class="fw-bold mb-3">
                                {{ $anabul->nama }}
                            </h4>

                            <p class="mb-1">
                                <strong>Ras:</strong>
                                {{ $anabul->ras }}
                            </p>

                            <p class="mb-1">
                                <strong>Jenis Kelamin:</strong>
                                {{ $anabul->jenis_kelamin }}
                            </p>

                            <p class="mb-1">
                                <strong>Umur:</strong>
                                {{ $anabul->umur }} bulan
                            </p>

                            <p class="mb-1">
                                <strong>Warna:</strong>
                                {{ $anabul->warna }}
                            </p>

                            <p class="fw-bold mt-3 mb-2">
                                Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                            </p>

                            <span class="badge bg-secondary mb-3">
                                {{ $anabul->status_ketersediaan }}
                            </span>

                            <div>
                                <a href="{{ route('anabul.show', $anabul->id) }}"
                                   class="btn woofly-register w-100">
                                    Lihat Detail
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="text-center py-5">
            <p class="text-muted">
                Belum ada anabul yang tersedia.
            </p>
        </div>

    @endif

</div>

@endsection