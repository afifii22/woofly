<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard owner - WOOFLY</title>
</head>
<body>
    <h1>WOOFLY</h1>
    <h2>Dashboard Owner</h2>

    <p>Selamat datang, {{ Auth::user()->nama }}!</p>
    <a href="{{ route('anabul.create') }}">Tambah Anabul</a>
    <a href="{{ url('/') }}">Back To Home</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    
</body>
</html>