<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kelola Data Anabul - WOOFLY</title>

    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js'
    ])
</head>

<body class="owner-page">

    <div class="owner-layout">

        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- MAIN AREA --}}
        <div class="owner-main">

            {{-- NAVBAR OWNER --}}
            @section('owner-page-title', 'Kelola Data Anabul')
            @include('layouts.owner-navbar')


            {{-- ============================================================
                 KONTEN KELOLA DATA ANABUL
            ============================================================ --}}
            <section class="owner-dashboard">

                {{-- TOMBOL TAMBAH --}}
                <div class="owner-anabul-topbar">
                    <a href="{{ route('anabul.create') }}" class="owner-btn-primary">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Anabul
                    </a>
                </div>


                {{-- SUCCESS MESSAGE --}}
                @if (session('success'))
                    <div class="owner-alert-success">
                        <i class="fa-solid fa-circle-check"></i>
                        {{ session('success') }}
                    </div>
                @endif


                {{-- TABEL ANABUL --}}
                <div class="owner-panel">

                    <div class="owner-panel-header">

                        <div>
                            <p class="owner-panel-label">Data</p>
                            <h3>Daftar Anabul</h3>
                        </div>

                        <span class="owner-panel-badge">
                            {{ $anabuls->count() }} Anabul
                        </span>

                    </div>


                    <div class="owner-table-wrapper">

                        @if ($anabuls->count())

                            <table class="owner-table owner-anabul-table">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Ras</th>
                                        <th>Usia</th>
                                        <th>JenisKel</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($anabuls as $anabul)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>

                                            {{-- FOTO --}}
                                            <td>
                                                @if ($anabul->foto)
                                                    <img
                                                        src="{{ asset('images/' . $anabul->foto) }}"
                                                        alt="{{ $anabul->nama }}"
                                                        class="owner-anabul-foto"
                                                    >
                                                @else
                                                    <div class="owner-anabul-foto-empty">
                                                        <i class="fa-solid fa-dog"></i>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                <strong>{{ $anabul->nama }}</strong>
                                            </td>

                                            <td>{{ $anabul->ras }}</td>

                                            <td>{{ $anabul->umur }} bulan</td>

                                            <td>{{ $anabul->jenis_kelamin }}</td>

                                            <td>
                                                Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                                            </td>

                                            {{-- STATUS --}}
                                            <td>
                                                <span class="owner-status {{ $anabul->status_ketersediaan === 'Tersedia' ? 'status-tersedia' : 'status-terjual' }}">
                                                    {{ $anabul->status_ketersediaan }}
                                                </span>
                                            </td>

                                            {{-- AKSI --}}
                                            <td>
                                                <div class="owner-aksi">

                                                    <a
                                                        href="{{ route('anabul.edit', $anabul->id) }}"
                                                        class="owner-aksi-btn owner-aksi-edit"
                                                        title="Edit"
                                                    >
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('anabul.destroy', $anabul->id) }}"
                                                        method="POST"
                                                        style="display:inline;"
                                                    >
                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="owner-aksi-btn owner-aksi-delete"
                                                            title="Hapus"
                                                            onclick="return confirm('Yakin ingin menghapus anabul ini?')"
                                                        >
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        @else

                            <div class="owner-empty">
                                <i class="fa-solid fa-dog"></i>
                                <p>Belum ada data anabul.</p>
                                <a href="{{ route('anabul.create') }}" class="owner-btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    Tambah Anabul Pertama
                                </a>
                            </div>

                        @endif

                    </div>

                </div>

            </section>

        </div>

    </div>

</body>

</html>
