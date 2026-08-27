<!DOCTYPE html>
<html>
<head>
    <title>Edit Anabul - WOOFLY</title>
</head>
<body>

    <h1>Edit Anabul</h1>

    <form action="{{ route('anabul.update', $anabul->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama', $anabul->nama) }}" required>
        <br><br>

        <label>Ras</label><br>
        <input type="text" name="ras" value="{{ old('ras', $anabul->ras) }}" required>
        <br><br>

        <label>Jenis Kelamin</label><br>
        <select name="jenis_kelamin" required>
            <option value="Jantan" {{ $anabul->jenis_kelamin === 'Jantan' ? 'selected' : '' }}>
                Jantan
            </option>
            <option value="Betina" {{ $anabul->jenis_kelamin === 'Betina' ? 'selected' : '' }}>
                Betina
            </option>
        </select>
        <br><br>

        <label>Umur (bulan)</label><br>
        <input type="number" name="umur" value="{{ old('umur', $anabul->umur) }}" min="0" required>
        <br><br>

        <label>Warna</label><br>
        <input type="text" name="warna" value="{{ old('warna', $anabul->warna) }}" required>
        <br><br>

        <label>Harga</label><br>
        <input type="number" name="harga" value="{{ old('harga', $anabul->harga) }}" min="0" required>
        <br><br>

        <label>Foto</label><br>
        <input type="text" name="foto" value="{{ old('foto', $anabul->foto) }}" required>
        <br><br>

        <label>Kondisi</label><br>
        <textarea name="kondisi" required>{{ old('kondisi', $anabul->kondisi) }}</textarea>
        <br><br>

        <label>Status Ketersediaan</label><br>
        <select name="status_ketersediaan" required>
            <option value="Tersedia" {{ $anabul->status_ketersediaan === 'Tersedia' ? 'selected' : '' }}>
                Tersedia
            </option>
            <option value="Tidak Tersedia" {{ $anabul->status_ketersediaan === 'Tidak Tersedia' ? 'selected' : '' }}>
                Tidak Tersedia
            </option>
        </select>
        <br><br>

        <button type="submit">Update</button>
    </form>

    <br>

    <a href="{{ route('anabul.index') }}">Kembali ke Katalog</a>

</body>
</html>