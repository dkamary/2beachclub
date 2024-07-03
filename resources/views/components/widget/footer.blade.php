{{-- Footer --}}


<footer class="page-footer p-3">

    <section class="text pb-1 mb-0">

        <div class="row col-10 col-sm-3 col-md-2 mx-auto overflow-hidden">
            <img class="img-fluid lazy-load-image"
                src="{{ asset('v2/img/2Beach-Club-by-2F-Final-logo-mini.webp') }}"
                data-src="{{ asset('v2/img/2Beach-Club-by-2F-Final-logo.webp') }}"
                alt="2beach-club-logo"
            />
        </div>

    </section>

    <section class="copyright">

        <p class="text-center text-white mb-1">
            {{ date('Y') }}© Two Futures Realty, Ltd. <br>All rights reserved
        </p>

    </section>
</footer>

@once

    @push('head')

        <style id="footer-styles">
            .page-footer {
                background-color: #3F9CAA;
                color: #ffffff;
            }

        </style>

    @endpush

@endonce
