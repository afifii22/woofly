<footer class="woofly-footer text-white mt-5">
    <div class="container py-5">

        <div class="row">

            <div class="col-md-5 mb-4">
                <h4 class="fw-bold">Woofly</h4>

                <p class="text-white-50">
                    Temukan anabul terbaik untuk menjadi temanmu.
                </p>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Navigation</h6>

                <a href="{{ url('/') }}"
                   class="d-block text-white-50 text-decoration-none mb-2">
                    Home
                </a>

                <a href="{{ route('anabul.index') }}"
                   class="d-block text-white-50 text-decoration-none mb-2">
                    Catalog
                </a>

                <a href="{{ route('contact') }}"
                   class="d-block text-white-50 text-decoration-none">
                    Contact
                </a>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold">Contact</h6>

                <p class="text-white-50 mb-1">
                    WOOFLY Dog Shop
                </p>

                <p class="text-white-50">
                    Temukan sahabat terbaikmu bersama WOOFLY.
                </p>
            </div>

        </div>

        <hr class="border-secondary">

        <div class="d-flex justify-content-between flex-column flex-md-row gap-2">
            <small class="text-white-50">
                © {{ date('Y') }} WOOFLY. All rights reserved.
            </small>

            <small class="text-white-50">
                Made with love for dog lovers.
            </small>
        </div>

    </div>
</footer>