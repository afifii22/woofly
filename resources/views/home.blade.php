@extends('layouts.app')

@section('content')

{{-- ============================================================ --}}
{{-- HERO --}}
{{-- ============================================================ --}}
<section class="hero-section" id="home">
    <div class="container-xl">
        <div class="row align-items-center">

            {{-- Copy --}}
            <div class="col-lg-5 col-md-6">
                <p class="hero-eyebrow">Welcome to Woofly</p>
                <h1 class="hero-title">
                    Find Your New<br>
                    <em>Best Friend</em>
                </h1>
                <p class="hero-desc">
                    Woofly helps you discover detailed information about available dogs
                    and place your order online easily, safely, and with genuine care.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#catalog" class="btn-primary-woofly">View Catalog</a>
                    <a href="#about" class="btn-outline-woofly">Learn More</a>
                </div>
            </div>

            {{-- Image --}}
            <div class="col-lg-7 col-md-6 mt-4 mt-md-0">
                <div class="hero-image-wrap">
                    <img src="{{ asset('images/hero-dog.jpg') }}" alt="Your friendly dog">
                    <div class="image-badge">
                        <span class="brand-mark" style="width:22px;height:22px;font-size:11px;">W</span>
                        <span>
                            Your friendly<br>
                            <strong>Online Dog Shop</strong>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- ABOUT --}}
{{-- ============================================================ --}}
<section class="about-section" id="about">
    <div class="container-xl">
        <div class="row align-items-center">

            {{-- Image --}}
            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                <div class="about-image-wrap">
                    <img src="{{ asset('images/about-dog.jpg') }}" alt="About Woofly">
                </div>
            </div>

            {{-- Copy --}}
            <div class="col-lg-7 col-md-6 ps-lg-5">
                <p class="about-eyebrow">About Woofly</p>
                <h2 class="about-title">
                    Your Online Dog Shop,<br>
                    <em>Made Simple.</em>
                </h2>
                <p class="about-text">
                    Woofly is an online dog shop designed to make finding your perfect
                    companion as easy and enjoyable as possible. Browse through our
                    catalog of available dogs, explore complete details for each one, and
                    place your order right from your device.
                </p>
                <p class="about-text">
                    We believe that every family deserves to find the right dog for them —
                    and we are here to make that journey straightforward, transparent, and
                    stress-free from start to finish.
                </p>

                <div class="benefit-item">
                    <span class="benefit-icon"></span>
                    <div class="benefit-label">
                        <strong>Browse With Ease</strong>
                        <small>Find complete details on every available dog</small>
                    </div>
                </div>

                <div class="benefit-item">
                    <span class="benefit-icon"></span>
                    <div class="benefit-label">
                        <strong>Browse With Ease</strong>
                        <small>Find complete details on every available dog</small>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- GALLERY --}}
{{-- ============================================================ --}}
<section class="gallery-section" id="gallery">
    <div class="container-xl">

        {{-- Heading --}}
        <div class="text-center mb-5">
            <p class="section-eyebrow">Woofly Gallery</p>
            <h2 class="section-title">Meet Them Before<br><em>You Meet Them</em></h2>
            <p class="section-sub">A little look at the characters waiting to become part of your story.</p>
        </div>

        {{-- Grid 4 + 4 --}}
        @php
            $gallery = [
                'gallery-1.jpg',
                'gallery-2.jpg',
                'gallery-3.jpg',
                'gallery-4.jpg',
                'gallery-5.jpg',
                'gallery-6.jpg',
                'gallery-7.jpg',
                'gallery-8.jpg',
            ];
        @endphp

        <div class="row g-3">
            @foreach ($gallery as $foto)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="gallery-card">
                    <div class="gallery-card-img">
                        @if (file_exists(public_path('images/' . $foto)))
                            <img src="{{ asset('images/' . $foto) }}" alt="Gallery photo" loading="lazy">
                        @else
                            <span class="gallery-card-placeholder" aria-hidden="true"></span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ============================================================ --}}
{{-- FEATURED DOGS --}}
{{-- ============================================================ --}}
<section class="catalog-section" id="catalog">
    <div class="container-xl">

        {{-- Heading --}}
        <div class="text-center mb-5">
            <p class="section-eyebrow">Featured Dogs</p>
            <h2 class="section-title">Find Your New Companion</h2>
            <p class="section-sub">
                Browse our available dogs and find the one that<br class="d-none d-md-block">
                feels just right.
            </p>
        </div>

        {{-- Cards --}}
        <div class="row g-4 justify-content-center">
            @isset($anabuls)
                @forelse ($anabuls as $anabul)
                <div class="col-lg-4 col-md-6">
                    <div class="dog-card">

                        {{-- Gambar --}}
                        @if (!empty($anabul->foto))
                            <img
                                src="{{ asset('images/' . $anabul->foto) }}"
                                alt="{{ $anabul->nama }}"
                                class="dog-card-img"
                                loading="lazy"
                            >
                        @else
                            <span class="dog-card-img-placeholder" aria-hidden="true"></span>
                        @endif

                        <div class="dog-card-body">

                            {{-- Nama & Harga --}}
                            <div class="dog-card-top">
                                <h3 class="dog-name">{{ $anabul->nama }}</h3>
                                <span class="dog-price">
                                    Rp. {{ number_format($anabul->harga, 0, ',', '.') }}
                                </span>
                            </div>

                            {{-- Ras --}}
                            <p class="dog-breed">{{ $anabul->ras ?? $anabul->breed ?? '-' }}</p>

                            {{-- Spesifikasi --}}
                            <div class="dog-specs">
                                <div class="spec-item">
                                    <span class="spec-label">Gender</span>
                                    <span class="spec-value">{{ $anabul->jenis_kelamin ?? $anabul->gender ?? '-' }}</span>
                                </div>
                                <div class="spec-item">
                                    <span class="spec-label">Age</span>
                                    <span class="spec-value">{{ $anabul->umur ?? $anabul->age ?? '-' }}</span>
                                </div>
                                <div class="spec-item">
                                    <span class="spec-label">Color</span>
                                    <span class="spec-value">{{ $anabul->warna ?? $anabul->color ?? '-' }}</span>
                                </div>
                            </div>

                            {{-- Tombol --}}
                            @if (Route::has('anabul.show'))
                                <a href="{{ route('anabul.show', $anabul->id) }}" class="btn-detail">View Detail</a>
                            @else
                                <a href="#" class="btn-detail">View Detail</a>
                            @endif

                        </div>
                    </div>
                </div>
                @empty
                {{-- Fallback kalau $anabuls kosong --}}
                <div class="col-12 text-center py-4">
                    <p style="color: var(--muted); font-size: 14px;">Belum ada anjing tersedia saat ini.</p>
                </div>
                @endforelse
            @else
            {{-- Fallback kalau $anabuls belum ada di route --}}
            @php
                $fallback = [
                    ['nama' => 'Max',  'ras' => 'Golden Retriever', 'harga' => 8500000, 'gender' => 'Male', 'age' => '8 Months', 'color' => 'Golden'],
                    ['nama' => 'Max',  'ras' => 'Golden Retriever', 'harga' => 8500000, 'gender' => 'Male', 'age' => '8 Months', 'color' => 'Golden'],
                    ['nama' => 'Max',  'ras' => 'Golden Retriever', 'harga' => 8500000, 'gender' => 'Male', 'age' => '8 Months', 'color' => 'Golden'],
                ];
            @endphp
            @foreach ($fallback as $dog)
            <div class="col-lg-4 col-md-6">
                <div class="dog-card">
                    <span class="dog-card-img-placeholder" aria-hidden="true"></span>
                    <div class="dog-card-body">
                        <div class="dog-card-top">
                            <h3 class="dog-name">{{ $dog['nama'] }}</h3>
                            <span class="dog-price">Rp. {{ number_format($dog['harga'], 0, ',', '.') }}</span>
                        </div>
                        <p class="dog-breed">{{ $dog['ras'] }}</p>
                        <div class="dog-specs">
                            <div class="spec-item">
                                <span class="spec-label">Gender</span>
                                <span class="spec-value">{{ $dog['gender'] }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Age</span>
                                <span class="spec-value">{{ $dog['age'] }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Color</span>
                                <span class="spec-value">{{ $dog['color'] }}</span>
                            </div>
                        </div>
                        <a href="#" class="btn-detail">View Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endisset
        </div>

        {{-- View Full Catalog --}}
        <div class="text-center mt-5">
            <a href="#catalog" class="btn-catalog-outline">View Full Catalog</a>
        </div>

    </div>
</section>

@endsection