@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="text-center mb-4">
                <h1 class="fw-bold">Ubah Profil</h1>
                <p class="text-muted">
                    Perbarui informasi profil akun kamu.
                </p>
            </div>


            {{-- Pesan berhasil --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{-- Form --}}
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('customer.profile.update') }}"
                          method="POST">

                        @csrf
                        @method('PUT')


                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                value="{{ old('nama', Auth::user()->nama) }}"
                                required
                            >
                        </div>


                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', Auth::user()->email) }}"
                                required
                            >
                        </div>


                        {{-- Password Baru --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                Password Baru
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Kosongkan jika tidak ingin mengubah"
                            >
                        </div>


                        {{-- Konfirmasi Password --}}
                        <div class="mb-4">
                            <label for="password_confirmation"
                                   class="form-label fw-semibold">
                                Konfirmasi Password Baru
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Kosongkan jika tidak ingin mengubah"
                            >
                        </div>


                        {{-- Tombol --}}
                        <button type="submit"
                                class="btn woofly-register w-100">
                            Simpan Perubahan
                        </button>

                    </form>


                    {{-- Kembali --}}
                    <div class="text-center mt-3">
                        <a href="{{ url('/') }}"
                           class="text-decoration-none text-muted">
                            ← Kembali ke Home
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection