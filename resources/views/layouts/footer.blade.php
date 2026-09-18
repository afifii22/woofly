<footer class="woofly-footer text-white">
    <div class="container py-5">

        <div class="row">

            {{-- WOOFLY --}}
            <div class="col-md-6 mb-4">

                <div class="d-flex align-items-center mb-3">
                    <span class="logo-circle me-2">W</span>
                    <h4 class="fw-bold mb-0">WOOFLY</h4>
                </div>

                <p class="text-white-50 mb-4">
                    Platform dog shop untuk menemukan anabul terbaik
                    sebagai teman dan bagian dari keluarga.
                </p>

                {{-- SOCIAL MEDIA --}}
                <div class="woofly-social">

                    {{-- WhatsApp --}}
                    <a href="https://wa.me/6285290234420"
                       target="_blank"
                       aria-label="WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    {{-- Instagram --}}
                    <a href="https://www.instagram.com/yg_treasure_official/?hl=id"
                       target="_blank"
                       aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    {{-- TikTok --}}
                    <a href="https://www.tiktok.com/@yg_treasure_tiktok"
                       target="_blank"
                       aria-label="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                </div>

            </div> {{-- TUTUP KOLOM WOOFLY --}}


            {{-- NAVIGATION --}}
            <div class="col-md-3 mb-4">

                <h6 class="woofly-footer-title">NAVIGATION</h6>

                <a href="{{ url('/') }}">
                    Home
                </a>

                <a href="{{ route('anabul.index') }}">
                    Catalog
                </a>

                <a href="{{ route('contact') }}">
                    Contact
                </a>

            </div>


            {{-- CONTACT --}}
            <div class="col-md-3">

                <h6 class="woofly-footer-title">CONTACT</h6>

                <div class="woofly-footer-contact">
                    <span>📧</span>
                    <span>woofly@gmail.com</span>
                </div>

                <div class="woofly-footer-contact">
                    <span>☎</span>
                    <span>085290234420</span>
                </div>

                <div class="woofly-footer-contact">
                    <span>📍</span>
                    <span>Jl.Treasure No.10</span>
                </div>

            </div>

        </div>


        {{-- GARIS --}}
        <div class="woofly-footer-line"></div>


        {{-- COPYRIGHT --}}
        <div class="woofly-footer-bottom">

            <small>
                © {{ date('Y') }} WOOFLY. All rights reserved.
            </small>

            <small>
                Made with love for dog lovers.
            </small>

        </div>

    </div>
</footer>