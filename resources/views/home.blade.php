<!DOCTYPE html>
<html>
<head>
    <title>WOOFLY - Home</title>
</head>
<body>
    @include('layouts.navbar')

    <hr>

    <main>
        <h1>Selamat Datang di WOOFLY</h1>

        <p>Temukan anabul terbaik untuk menjadi temanmu.</p>

        <a href="{{ url('/anabul') }}">Lihat Katalog</a>
    </main>

</body>
</html>