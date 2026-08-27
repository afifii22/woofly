<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anabul - WOOFLY</title>
</head>
<body>

    <h1>Tambah Anabul</h1>

    <form action="{{ route('anabul.store') }}" method="POST">
        @csrf

        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" required>
        <br><br>

        <label>Ras</label><br>
        <input type="text" name="ras" value="{{ old('ras') }}" required>
        <br><br>

        <label>Jenis Kelamin</label><br>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="Jantan">Jantan</option>
            <option value="Betina">Betina</option>
        </select>
        <br><br>

        <label>Umur (bulan)</label><br>
        <input type="number" name="umur" value="{{ old('umur') }}" min="0" required>
        <br><br>

        <label>Warna</label><br>
        <input type="text" name="warna" value="{{ old('warna') }}" required>
        <br><br>

        <label>Harga</label><br>
        <input type="number" name="harga" value="{{ old('harga') }}" min="0" required>
        <br><br>

        <label>Foto</label><br>
        <input type="text" name="foto" value="{{ old('foto') }}" placeholder="contoh: anabul/milo.jpg" required>
        <br><br>

        <label>Kondisi</label><br>
        <textarea name="kondisi" required>{{ old('kondisi') }}</textarea>
        <br><br>

        <label>Status Ketersediaan</label><br>
        <select name="status_ketersediaan" required>
            <option value="">-- Pilih --</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Tidak Tersedia">Tidak Tersedia</option>
        </select>
        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>

    <a href="{{ route('owner.dashboard') }}">Kembali ke Dashboard</a>

</body>
</html>