<!DOCTYPE html>
<html>
<head>
    <title>Pesan Anabul - WOOFLY</title>
</head>
<body>

    @include('layouts.navbar')

    <h1>Form Pemesanan</h1>

    <h2>{{ $anabul->nama }}</h2>

    <p>Ras: {{ $anabul->ras }}</p>
    <p>Jenis Kelamin: {{ $anabul->jenis_kelamin }}</p>
    <p>Harga: Rp {{ number_format($anabul->harga, 0, ',', '.') }}</p>

    <form action="{{ route('order.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="anabul_id" value="{{ $anabul->id }}">

        {{-- NO HP --}}
        <label>No. HP</label><br>
        <input type="text" name="no_hp" required>
        <br><br>


        {{-- METODE PEMBELIAN --}}
        <label>Metode Pembelian</label><br>

        <select name="metode_pembelian" id="metode_pembelian" required>
            <option value="">-- Pilih --</option>
            <option value="Diantar">Diantar</option>
            <option value="Diambil">Diambil</option>
        </select>

        <br><br>


        {{-- JIKA DIANTAR --}}
        <div id="form_diantar" style="display: none;">

            <label>Alamat Pengiriman</label><br>

            <textarea
                name="alamat_pengiriman"
                id="alamat_pengiriman"
                disabled
            ></textarea>

            <br><br>

        </div>


        {{-- JIKA DIAMBIL --}}
        <div id="form_diambil" style="display: none;">

            <label>Tanggal Pengambilan</label><br>

            <input
                type="date"
                name="tanggal_pengambilan"
                id="tanggal_pengambilan"
                disabled
            >

            <br><br>

            <label>Waktu Pengambilan</label><br>

            <input
                type="time"
                name="waktu_pengambilan"
                id="waktu_pengambilan"
                disabled
            >

            <br><br>

        </div>


        {{-- METODE PEMBAYARAN --}}
        <label>Metode Pembayaran</label><br>

        <select name="metode_pembayaran" id="metode_pembayaran" required>
            <option value="">-- Pilih --</option>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="COD">COD</option>
        </select>

        <br><br>


        {{-- JIKA TRANSFER BANK --}}
        <div id="form_transfer" style="display: none;">

            <label>Bukti Transfer</label><br>

            <input
                type="file"
                name="bukti_pembayaran"
                id="bukti_pembayaran"
                accept="image/jpeg,image/png,image/jpg"
                disabled
            >

            <br>

            <small>
                Upload bukti transfer dalam format JPG, JPEG, atau PNG.
            </small>

            <br><br>

        </div>


        {{-- JIKA COD --}}
        <div id="form_cod" style="display: none;">

            <p>
                ⚠️ <strong>Pemberitahuan COD:</strong><br>
                Pembayaran dilakukan secara tunai saat anabul diterima
                atau diambil. Pastikan menyiapkan uang sesuai nominal
                pembayaran.
            </p>

        </div>


        {{-- CATATAN --}}
        <label>Catatan</label><br>

        <textarea name="catatan"></textarea>

        <br><br>


        <button type="submit">Kirim Pesanan</button>

    </form>

    <br>

    <a href="{{ route('anabul.show', $anabul->id) }}">
        Kembali ke Detail
    </a>


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

</body>
</html>