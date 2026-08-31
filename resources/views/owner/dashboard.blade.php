<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Owner - WOOFLY</title>
</head>
<body>
    
    @include('layouts.owner-navbar')
    @include('layouts.sidebar')

    <main>
        <h1>Dashboard Owner</h1>
        <p>Selamat datang, {{ Auth::user()->nama }}!</p>

        <div>
            <h3>Total Anabul</h3>
            <p>{{ $totalAnabul }}</p>
        </div>

        <div>
            <h3>Total Customer</h3>
            <p>{{ $totalCustomer }}</p>
        </div>

        <div>
            <h3>Total Pesanan</h3>
            <p>{{ $totalPesanan }}</p>
        </div>

        <div>
            <h3>Pesanan Menunggu Konfirmasi</h3>
            <p>{{ $menungguKonfirmasi }}</p>
        </div>
    </main>

</body>
</html>



