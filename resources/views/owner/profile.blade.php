<!DOCTYPE html>
<html>
<head>
    <title>Ubah Profil Owner - WOOFLY</title>
</head>
<body>

    <h1>Ubah Profil Owner</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('owner.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama</label><br>
        <input
            type="text"
            name="nama"
            value="{{ old('nama', Auth::user()->nama) }}"
            required
        >

        <br><br>

        <label>Email</label><br>
        <input
            type="email"
            name="email"
            value="{{ old('email', Auth::user()->email) }}"
            required
        >

        <br><br>

        <label>Password Baru</label><br>
        <input
            type="password"
            name="password"
            placeholder="Kosongkan jika tidak ingin mengubah"
        >

        <br><br>

        <label>Konfirmasi Password Baru</label><br>
        <input
            type="password"
            name="password_confirmation"
            placeholder="Kosongkan jika tidak ingin mengubah"
        >

        <br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>

    <a href="{{ route('owner.dashboard') }}">Kembali ke Dashboard</a>

</body>
</html>