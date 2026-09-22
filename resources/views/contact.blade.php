@extends('layouts.app')

@section('content')

<div class="woofly-contact-page">

    {{-- HEADER --}}
    <div class="woofly-contact-header">
        <h1>Get in Touch</h1>

        <p>
            We'd love to hear from you! Feel free to reach out to WOOFLY<br>
            through the contact information below.
        </p>
    </div>


    {{-- CONTACT CARDS --}}
    <div class="container">
        <div class="row g-3 g-lg-4 justify-content-center">

            {{-- PHONE --}}
            <div class="col-md-4">
                <div class="woofly-contact-card">

                    <div class="woofly-contact-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <div class="woofly-contact-info">
                        <h5>Phone Number</h5>

                        <p>
                            085290234420
                        </p>
                    </div>

                </div>
            </div>


            {{-- EMAIL --}}
            <div class="col-md-4">
                <div class="woofly-contact-card">

                    <div class="woofly-contact-icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>

                    <div class="woofly-contact-info">
                        <h5>Email Address</h5>

                        <p>
                            woofly@gmail.com
                        </p>
                    </div>

                </div>
            </div>


            {{-- ADDRESS --}}
            <div class="col-md-4">
                <div class="woofly-contact-card">

                    <div class="woofly-contact-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div class="woofly-contact-info">
                        <h5>Store Address</h5>

                        <p>
                            Jl. Treasure No. 10, Limbasari,<br>
                            Bobotsari, Purbalingga, Jawa Tengah
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection