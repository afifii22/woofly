@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- JUDUL --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold">Form Pemesanan</h1>
        <p class="text-muted">
            Lengkapi data pemesanan anabul.
        </p>
    </div>


    <div class="row justify-content-center">

        <div class="col-lg-8">

            {{-- DATA ANABUL --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Data Anabul
                    </h4>

                    <h3 class="fw-bold">
                        {{ $anabul->nama }}
                    </h3>

                    <div class="row mt-3">

                        <div class="col-md-4 mb-2">
                            <span class="text-muted d-block">Ras</span>
                            <strong>{{ $anabul->ras }}</strong>
                        </div>

                        <div class="col-md-4 mb-2">
                            <span class="text-muted d-block">Jenis Kelamin</span>
                            <strong>{{ $anabul->jenis_kelamin }}</strong>
                        </div>

                        <div class="col-md-4 mb-2">
                            <span class="text-muted d-block">Harga</span>
                            <strong>
                                Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                            </strong>
                        </div>

                    </div>

                </div>

            </div>


            {{-- FORM PEMESANAN --}}
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('order.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <input type="hidden"
                               name="anabul_id"
                               value="{{ $anabul->id }}">


                        {{-- NO HP --}}
                        <div class="mb-4">

                            <label for="no_hp"
                                   class="form-label fw-semibold">
                                No. HP
                            </label>

                            <input type="text"
                                   name="no_hp"
                                   id="no_hp"
                                   class="form-control"
                                   required>

                        </div>


                        {{-- METODE PEMBELIAN --}}
                        <div class="mb-4">

                            <label for="metode_pembelian"
                                   class="form-label fw-semibold">
                                Metode Pembelian
                            </label>

                            <select name="metode_pembelian"
                                    id="metode_pembelian"
                                    class="form-select"
                                    required>

                                <option value="">-- Pilih --</option>
                                <option value="Diantar">Diantar</option>
                                <option value="Diambil">Diambil</option>

                            </select>

                        </div>


                        {{-- JIKA DIANTAR --}}
                        <div id="form_diantar"
                             class="mb-4"
                             style="display: none;">

                            <label for="alamat_pengiriman"
                                   class="form-label fw-semibold">
                                Alamat Pengiriman
                            </label>

                            <textarea
                                name="alamat_pengiriman"
                                id="alamat_pengiriman"
                                class="form-control"
                                rows="4"
                                disabled
                            ></textarea>

                        </div>


                        {{-- JIKA DIAMBIL --}}
                        <div id="form_diambil"
                             class="mb-4"
                             style="display: none;">

                            <div class="mb-3">

                                <label for="tanggal_pengambilan"
                                       class="form-label fw-semibold">
                                    Tanggal Pengambilan
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_pengambilan"
                                    id="tanggal_pengambilan"
                                    class="form-control"
                                    disabled
                                >

                            </div>


                            <div>

                                <label for="waktu_pengambilan"
                                       class="form-label fw-semibold">
                                    Waktu Pengambilan
                                </label>

                                <input
                                    type="time"
                                    name="waktu_pengambilan"
                                    id="waktu_pengambilan"
                                    class="form-control"
                                    disabled
                                >

                            </div>

                        </div>


                        {{-- METODE PEMBAYARAN --}}
                        <div class="mb-4">

                            <label for="metode_pembayaran"
                                   class="form-label fw-semibold">
                                Metode Pembayaran
                            </label>

                            <select name="metode_pembayaran"
                                    id="metode_pembayaran"
                                    class="form-select"
                                    required>

                                <option value="">-- Pilih --</option>
                                <option value="Transfer Bank">
                                    Transfer Bank
                                </option>
                                <option value="COD">
                                    COD
                                </option>

                            </select>

                        </div>


                        {{-- JIKA TRANSFER BANK --}}
                        <div id="form_transfer"
                             class="mb-4"
                             style="display: none;">

                            <label for="bukti_pembayaran"
                                   class="form-label fw-semibold">
                                Bukti Transfer
                            </label>

                            <input
                                type="file"
                                name="bukti_pembayaran"
                                id="bukti_pembayaran"
                                class="form-control"
                                accept="image/jpeg,image/png,image/jpg"
                                disabled
                            >

                            <div class="form-text">
                                Upload bukti transfer dalam format
                                JPG, JPEG, atau PNG.
                            </div>

                        </div>


                        {{-- JIKA COD --}}
                        <div id="form_cod"
                             class="alert alert-warning mb-4"
                             style="display: none;">

                            ⚠️ <strong>Pemberitahuan COD:</strong><br>

                            Pembayaran dilakukan secara tunai saat anabul
                            diterima atau diambil. Pastikan menyiapkan uang
                            sesuai nominal pembayaran.

                        </div>


                        {{-- CATATAN --}}
                        <div class="mb-4">

                            <label for="catatan"
                                   class="form-label fw-semibold">
                                Catatan
                            </label>

                            <textarea
                                name="catatan"
                                id="catatan"
                                class="form-control"
                                rows="4"
                            ></textarea>

                        </div>


                        {{-- BUTTON --}}
                        <button type="submit"
                                class="btn woofly-register w-100 py-2">
                            Kirim Pesanan
                        </button>

                    </form>


                    {{-- KEMBALI --}}
                    <div class="text-center mt-4">

                        <a href="{{ route('anabul.show', $anabul->id) }}"
                           class="text-decoration-none text-muted">
                            ← Kembali ke Detail
                        </a>

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