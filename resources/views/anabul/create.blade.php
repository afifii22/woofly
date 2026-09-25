<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tambah Anabul - WOOFLY</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="owner-page">

    <div class="owner-layout">

        @include('layouts.sidebar')

        <div class="owner-main">

            @section('owner-page-title', 'Tambah Anabul')
            @include('layouts.owner-navbar')

            <section class="owner-dashboard">

                <div class="owner-form-wrapper">

                    {{-- CARD FORM --}}
                    <div class="owner-form-card">

                        <div class="owner-form-card-header">
                            <span class="owner-form-icon">
                                <i class="fa-solid fa-paw"></i>
                            </span>
                            <div>
                                <p class="owner-panel-label">Manajemen Anabul</p>
                                <h2 class="owner-form-title">Tambah Anabul Baru</h2>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="owner-alert-error">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('anabul.store') }}" method="POST" class="owner-form">
                            @csrf

                            {{-- ROW 1: Nama + Ras --}}
                            <div class="owner-form-row">
                                <div class="owner-form-group">
                                    <label for="nama">Nama Anabul</label>
                                    <input
                                        type="text"
                                        id="nama"
                                        name="nama"
                                        value="{{ old('nama') }}"
                                        placeholder="cth: Max"
                                        class="owner-form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                </div>

                                <div class="owner-form-group">
                                    <label for="ras">Ras</label>
                                    <input
                                        type="text"
                                        id="ras"
                                        name="ras"
                                        value="{{ old('ras') }}"
                                        placeholder="cth: Husky"
                                        class="owner-form-control {{ $errors->has('ras') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                </div>
                            </div>

                            {{-- ROW 2: Jenis Kelamin + Umur --}}
                            <div class="owner-form-row">
                                <div class="owner-form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select
                                        id="jenis_kelamin"
                                        name="jenis_kelamin"
                                        class="owner-form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                        <option value="">-- Pilih --</option>
                                        <option value="Jantan" {{ old('jenis_kelamin') === 'Jantan' ? 'selected' : '' }}>Jantan</option>
                                        <option value="Betina" {{ old('jenis_kelamin') === 'Betina' ? 'selected' : '' }}>Betina</option>
                                    </select>
                                </div>

                                <div class="owner-form-group">
                                    <label for="umur">Umur (bulan)</label>
                                    <input
                                        type="number"
                                        id="umur"
                                        name="umur"
                                        value="{{ old('umur') }}"
                                        placeholder="cth: 3"
                                        min="0"
                                        class="owner-form-control {{ $errors->has('umur') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                </div>
                            </div>

                            {{-- ROW 3: Warna + Harga --}}
                            <div class="owner-form-row">
                                <div class="owner-form-group">
                                    <label for="warna">Warna</label>
                                    <input
                                        type="text"
                                        id="warna"
                                        name="warna"
                                        value="{{ old('warna') }}"
                                        placeholder="cth: Abu-abu putih"
                                        class="owner-form-control {{ $errors->has('warna') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                </div>

                                <div class="owner-form-group">
                                    <label for="harga">Harga (Rp)</label>
                                    <input
                                        type="number"
                                        id="harga"
                                        name="harga"
                                        value="{{ old('harga') }}"
                                        placeholder="cth: 8000000"
                                        min="0"
                                        class="owner-form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                </div>
                            </div>

                            {{-- ROW 4: Foto + Status --}}
                            <div class="owner-form-row">
                                <div class="owner-form-group">
                                    <label for="foto">Nama File Foto</label>
                                    <input
                                        type="text"
                                        id="foto"
                                        name="foto"
                                        value="{{ old('foto') }}"
                                        placeholder="cth: max.jpg"
                                        class="owner-form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                </div>

                                <div class="owner-form-group">
                                    <label for="status_ketersediaan">Status Ketersediaan</label>
                                    <select
                                        id="status_ketersediaan"
                                        name="status_ketersediaan"
                                        class="owner-form-control {{ $errors->has('status_ketersediaan') ? 'is-invalid' : '' }}"
                                        required
                                    >
                                        <option value="">-- Pilih --</option>
                                        <option value="Tersedia" {{ old('status_ketersediaan') === 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="Tidak Tersedia" {{ old('status_ketersediaan') === 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Kondisi --}}
                            <div class="owner-form-group">
                                <label for="kondisi">Kondisi / Deskripsi</label>
                                <textarea
                                    id="kondisi"
                                    name="kondisi"
                                    rows="4"
                                    placeholder="Ceritakan kondisi dan kepribadian anabul..."
                                    class="owner-form-control {{ $errors->has('kondisi') ? 'is-invalid' : '' }}"
                                    required
                                >{{ old('kondisi') }}</textarea>
                            </div>

                            {{-- ACTIONS --}}
                            <div class="owner-form-actions">
                                <a href="{{ route('owner.anabul.index') }}" class="owner-btn-secondary">
                                    Batal
                                </a>
                                <button type="submit" class="owner-btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    Simpan Anabul
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </section>

        </div>

    </div>

</body>
</html>
