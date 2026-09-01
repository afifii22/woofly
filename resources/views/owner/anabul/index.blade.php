<!DOCTYPE html>
<html>
<head>
    <title>Kelola Data Anabul - WOOFLY</title>
</head>
<body>

    @include('layouts.owner-navbar')
    @include('layouts.sidebar')

    <main>

        <h1>Kelola Data Anabul</h1>

        <a href="{{ route('anabul.create') }}">
            + Tambah Anabul
        </a>

        <br><br>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if ($anabuls->count())

            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Ras</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Warna</th>
                        <th>Harga</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($anabuls as $anabul)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $anabul->nama }}</td>
                            <td>{{ $anabul->ras }}</td>
                            <td>{{ $anabul->jenis_kelamin }}</td>
                            <td>{{ $anabul->umur }} bulan</td>
                            <td>{{ $anabul->warna }}</td>
                            <td>
                                Rp {{ number_format($anabul->harga, 0, ',', '.') }}
                            </td>
                            <td>{{ $anabul->kondisi }}</td>
                            <td>{{ $anabul->status_ketersediaan }}</td>

                            <td>
                                <a href="{{ route('anabul.edit', $anabul->id) }}">
                                    Edit
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
                                        onclick="return confirm('Yakin ingin menghapus anabul ini?')"
                                    >
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <p>Belum ada data anabul.</p>

        @endif

    </main>

</body>
</html>