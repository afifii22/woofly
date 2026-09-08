@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center py-5">
        <h1 class="display-4 fw-bold">
            Selamat Datang di WOOFLY
        </h1>

        <p class="lead text-muted">
            Temukan anabul terbaik untuk menjadi temanmu.
        </p>

        <a href="{{ route('anabul.index') }}"
           class="btn woofly-register mt-3">
            Lihat Katalog
        </a>
    </div>

</div>

@endsection