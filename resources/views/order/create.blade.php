@extends('layouts.app')

@section('content')

<div class="container-fluid woofly-order-page py-5">

    {{-- JUDUL --}}
    <div class="container-fluid px-4 px-lg-5 mb-4">
        <h1 class="fw-bold woofly-order-title mb-2">
            Konfirmasi Pesanan
        </h1>

        {{-- <p class="text-muted mb-0">
            Lengkapi data pemesanan anabul.
        </p> --}}
    </div>


    <div class="container-fluid px-4 px-lg-5">

        <div class="row justify-content-center">

            <div class="col-12 col-xxl-11">

                {{-- DATA ANABUL --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4 woofly-order-card">

                    <div class="card-body p-4 p-md-5">

                        <div class="d-flex align-items-center gap-3 mb-4">
                            <span class="woofly-step-number">1</span>

                            <h4 class="fw-bold mb-0">
                                Anabul yang Dipesan
                            </h4>
                        </div>


                        <div class="woofly-anabul-box">

                            <div class="woofly-anabul-image">

                                @if ($anabul->foto)

                                    <img
                                        src="{{ asset('images/' . $anabul->foto) }}"
                                        alt="{{ $anabul->nama }}"
                                    >

                                @else

                                    <div class="woofly-no-image">
                                        No Image
                                    </div>

                                @endif

                            </div>


                            <div class="flex-grow-1">

                                <h3 class="fw-bold mb-1">
                                    {{ $anabul->nama }}
                                </h3>

                                <p class="mb-0 woofly-anabul-breed">
                                    {{ $anabul->ras }}
                                </p>

                            </div>


                            <div class="woofly-anabul-price">

                                Rp {{ number_format($anabul->harga, 0, ',', '.') }}

                            </div>

                        </div>

                    </div>

                </div>


                {{-- FORM PEMESANAN --}}
                <div class="card border-0 shadow-sm rounded-4 woofly-order-card">

                    <div class="card-body p-4 p-md-5">

                        <form
                            action="{{ route('order.store') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf

                            <input
                                type="hidden"
                                name="anabul_id"
                                value="{{ $anabul->id }}"
                            >


                            {{-- INFORMASI PEMESAN --}}
                            <div class="woofly-order-section mb-4">

                                <div class="d-flex align-items-center gap-3 mb-4">

                                    <span class="woofly-step-number">
                                        2
                                    </span>

                                    <h4 class="fw-bold mb-0">
                                        Informasi Pemesanan
                                    </h4>

                                </div>


                                <div class="row g-3">

                                    <div class="col-md-6">

                                        <label
                                            for="nama"
                                            class="form-label woofly-form-label"
                                        >
                                            Nama Lengkap <span>*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="nama"
                                            class="form-control woofly-form-control"
                                            value="{{ Auth::user()->nama }}"
                                            readonly
                                        >

                                    </div>


                                    <div class="col-md-6">

                                        <label
                                            for="no_hp"
                                            class="form-label woofly-form-label"
                                        >
                                            Nomor Telepon <span>*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="no_hp"
                                            id="no_hp"
                                            class="form-control woofly-form-control"
                                            value="{{ old('no_hp') }}"
                                            required
                                        >

                                    </div>

                                </div>

                            </div>


                            {{-- METODE PEMBELIAN --}}
                            <div class="woofly-order-section mb-4">

                                <div class="d-flex align-items-center gap-3 mb-4">

                                    <span class="woofly-step-number">
                                        3
                                    </span>

                                    <h4 class="fw-bold mb-0">
                                        Metode Pembelian
                                    </h4>

                                </div>


                                <label
                                    for="metode_pembelian"
                                    class="form-label woofly-form-label"
                                >
                                    Pilih Metode Pembelian
                                </label>

                                <select
                                    name="metode_pembelian"
                                    id="metode_pembelian"
                                    class="form-select woofly-form-control"
                                    required
                                >

                                    <option value="">
                                        -- Pilih --
                                    </option>

                                    <option value="Diantar">
                                        Diantar
                                    </option>

                                    <option value="Diambil">
                                        Diambil
                                    </option>

                                </select>


                                {{-- JIKA DIANTAR --}}
                                <div
                                    id="form_diantar"
                                    class="mt-4"
                                    style="display: none;"
                                >

                                    <label
                                        for="alamat_pengiriman"
                                        class="form-label woofly-form-label"
                                    >
                                        Alamat Pengiriman
                                    </label>

                                    <textarea
                                        name="alamat_pengiriman"
                                        id="alamat_pengiriman"
                                        class="form-control woofly-form-control"
                                        rows="4"
                                        disabled
                                    ></textarea>

                                </div>


                                {{-- JIKA DIAMBIL --}}
                                <div
                                    id="form_diambil"
                                    class="mt-4"
                                    style="display: none;"
                                >

                                    <div class="row g-3">

                                        <div class="col-md-6">

                                            <label
                                                for="tanggal_pengambilan"
                                                class="form-label woofly-form-label"
                                            >
                                                Tanggal Pengambilan
                                            </label>

                                            <input
                                                type="date"
                                                name="tanggal_pengambilan"
                                                id="tanggal_pengambilan"
                                                class="form-control woofly-form-control"
                                                disabled
                                            >

                                        </div>


                                        <div class="col-md-6">

                                            <label
                                                for="waktu_pengambilan"
                                                class="form-label woofly-form-label"
                                            >
                                                Waktu Pengambilan
                                            </label>

                                            <input
                                                type="time"
                                                name="waktu_pengambilan"
                                                id="waktu_pengambilan"
                                                class="form-control woofly-form-control"
                                                disabled
                                            >

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- CATATAN --}}
                            <div class="woofly-order-section mb-4">

                                <div class="d-flex align-items-center gap-3 mb-4">

                                    <span class="woofly-step-number">
                                        4
                                    </span>

                                    <h4 class="fw-bold mb-0">
                                        Catatan Tambahan
                                    </h4>

                                </div>


                                <label
                                    for="catatan"
                                    class="form-label woofly-form-label"
                                >
                                    Catatan Pesanan (Opsional)
                                </label>

                                <textarea
                                    name="catatan"
                                    id="catatan"
                                    class="form-control woofly-form-control"
                                    rows="4"
                                ></textarea>

                            </div>


                            {{-- METODE PEMBAYARAN --}}
                            <div class="woofly-order-section mb-4">

                                <div class="d-flex align-items-center gap-3 mb-4">

                                    <span class="woofly-step-number">
                                        5
                                    </span>

                                    <h4 class="fw-bold mb-0">
                                        Metode Pembayaran
                                    </h4>

                                </div>


                                <label
                                    for="metode_pembayaran"
                                    class="form-label woofly-form-label"
                                >
                                    Pilih Metode Pembayaran
                                </label>

                                <select
                                    name="metode_pembayaran"
                                    id="metode_pembayaran"
                                    class="form-select woofly-form-control"
                                    required
                                >

                                    <option value="">
                                        -- Pilih --
                                    </option>

                                    <option value="Transfer Bank">
                                        Transfer Bank
                                    </option>

                                    <option value="COD">
                                        COD
                                    </option>

                                </select>


                                {{-- JIKA TRANSFER BANK --}}
                                <div
                                    id="form_transfer"
                                    class="mt-4"
                                    style="display: none;"
                                >

                                    <div class="woofly-payment-box">

                                        <div class="woofly-payment-title">
                                            INFORMASI REKENING
                                        </div>


                                        <div class="row g-3">

                                            <div class="col-sm-6">
                                                <span class="woofly-payment-label">
                                                    Bank
                                                </span>

                                                <strong>BCA</strong>
                                            </div>


                                            <div class="col-sm-6">
                                                <span class="woofly-payment-label">
                                                    No. Rekening
                                                </span>

                                                <strong>
                                                    8812 3456 78
                                                </strong>
                                            </div>


                                            <div class="col-sm-6">
                                                <span class="woofly-payment-label">
                                                    Atas Nama
                                                </span>

                                                <strong>
                                                    Woofly Pet Store
                                                </strong>
                                            </div>


                                            <div class="col-sm-6">
                                                <span class="woofly-payment-label">
                                                    Jumlah Transfer
                                                </span>

                                                <strong>
                                                    Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                                                </strong>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="mt-4">

                                        <label
                                            for="bukti_pembayaran"
                                            class="form-label woofly-form-label"
                                        >
                                            Bukti Pembayaran <span>*</span>
                                        </label>

                                        <input
                                            type="file"
                                            name="bukti_pembayaran"
                                            id="bukti_pembayaran"
                                            class="form-control woofly-form-control"
                                            accept="image/jpeg,image/png,image/jpg"
                                            disabled
                                        >

                                        <div class="form-text">
                                            Upload bukti transfer dalam format
                                            JPG, JPEG, atau PNG.
                                        </div>

                                    </div>

                                </div>


                                {{-- JIKA COD --}}
                                <div
                                    id="form_cod"
                                    class="woofly-cod-box mt-4"
                                    style="display: none;"
                                >

                                    <div class="d-flex gap-3">

                                        <div class="woofly-cod-icon">
                                            <i class="fa-solid fa-money-bill-wave"></i>
                                        </div>

                                        <div>

                                            <strong>
                                                Pembayaran COD
                                            </strong>

                                            <p class="mb-0 mt-2">
                                                Pembayaran dilakukan secara tunai
                                                saat anabul diterima atau diambil.
                                                Pastikan menyiapkan uang sesuai
                                                nominal pembayaran.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- TOTAL --}}
                            <div class="woofly-order-total">

                                <span>
                                    Total Pembayaran
                                </span>

                                <strong>
                                    Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                                </strong>

                            </div>


                            {{-- BUTTON --}}
                            <div class="row g-3 mt-2">

                                <div class="col-md-4">

                                    <a
                                        href="{{ route('anabul.show', $anabul->id) }}"
                                        class="btn btn-light border w-100 py-3 rounded-3 fw-semibold"
                                    >
                                        ← Kembali
                                    </a>

                                </div>


                                <div class="col-md-8">

                                    <button
                                        type="submit"
                                        class="btn woofly-order-button w-100 py-3 rounded-3 fw-bold"
                                    >
                                        PESAN
                                    </button>

                                </div>

                            </div>

                        </form>




                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

// =========================
// METODE PEMBELIAN
// =========================

const metodePembelian =
    document.getElementById('metode_pembelian');

const formDiantar =
    document.getElementById('form_diantar');

const formDiambil =
    document.getElementById('form_diambil');

const alamatPengiriman =
    document.getElementById('alamat_pengiriman');

const tanggalPengambilan =
    document.getElementById('tanggal_pengambilan');

const waktuPengambilan =
    document.getElementById('waktu_pengambilan');


metodePembelian.addEventListener('change', function () {

    // Sembunyikan semua
    formDiantar.style.display = 'none';
    formDiambil.style.display = 'none';

    // Nonaktifkan semua input
    alamatPengiriman.disabled = true;
    tanggalPengambilan.disabled = true;
    waktuPengambilan.disabled = true;


    // Jika DIANTAR
    if (this.value === 'Diantar') {

        formDiantar.style.display = 'block';

        alamatPengiriman.disabled = false;
    }


    // Jika DIAMBIL
    if (this.value === 'Diambil') {

        formDiambil.style.display = 'block';

        tanggalPengambilan.disabled = false;
        waktuPengambilan.disabled = false;
    }

});


// =========================
// METODE PEMBAYARAN
// =========================

const metodePembayaran =
    document.getElementById('metode_pembayaran');

const formTransfer =
    document.getElementById('form_transfer');

const formCod =
    document.getElementById('form_cod');

const buktiPembayaran =
    document.getElementById('bukti_pembayaran');


metodePembayaran.addEventListener('change', function () {

    // Sembunyikan semua
    formTransfer.style.display = 'none';
    formCod.style.display = 'none';

    // Nonaktifkan upload
    buktiPembayaran.disabled = true;


    // Jika TRANSFER BANK
    if (this.value === 'Transfer Bank') {

        formTransfer.style.display = 'block';

        buktiPembayaran.disabled = false;
    }


    // Jika COD
    if (this.value === 'COD') {

        formCod.style.display = 'block';
    }

});

</script>

@endsection