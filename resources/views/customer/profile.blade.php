@extends('layouts.app')

@section('content')

<div class="woofly-profile-page">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- =========================
                 BAGIAN KIRI
            ========================== --}}
            <div class="col-lg-4">

                <div class="woofly-profile-intro">

                    <h1>
                        Edit Profil
                    </h1>

                    <p>
                        Manage and update your account information
                    </p>

                    {{-- FOTO ANJING TRANSPARAN --}}
                    <div class="woofly-profile-dog">

                        <img
                            src="{{ asset('images/profil.png') }}"
                            alt="Dog"
                        >

                    </div>

                </div>

            </div>


            {{-- =========================
                 BAGIAN KANAN
            ========================== --}}
            <div class="col-lg-8">

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

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- FORM --}}
                <div class="woofly-profile-card">

                    <form
                        action="{{ route('customer.profile.update') }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        {{-- NAMA --}}
                        <div class="woofly-profile-field">

                            <label for="nama">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                value="{{ old('nama', Auth::user()->nama) }}"
                                required
                            >

                        </div>


                        {{-- EMAIL --}}
                        <div class="woofly-profile-field">

                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', Auth::user()->email) }}"
                                required
                            >

                        </div>


                        {{-- PASSWORD --}}
                        <div class="woofly-profile-field">

                            <label for="password">
                                Password
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Kosongkan jika tidak diubah"
                            >

                        </div>


                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="woofly-profile-field">

                            <label for="password_confirmation">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Kosongkan jika tidak diubah"
                            >

                        </div>


                        {{-- BUTTON --}}
                        <div class="woofly-profile-actions">

                            <a
                                href="{{ url('/') }}"
                                class="woofly-profile-cancel"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="woofly-profile-save"
                            >
                                Save Changes
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection