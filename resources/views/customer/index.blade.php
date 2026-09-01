<!DOCTYPE html>
<html>
<head>
    <title>Data Customer - WOOFLY</title>
</head>
<body>

    @include('layouts.owner-navbar')
    @include('layouts.sidebar')

    <main>

        <h1>Kelola Data Customer</h1>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if ($customers->isEmpty())
            <p>Belum ada customer.</p>
        @else

            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->nama }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <form
                                    action="{{ route('customer.destroy', $customer->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus customer ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

    </main>

</body>
</html>