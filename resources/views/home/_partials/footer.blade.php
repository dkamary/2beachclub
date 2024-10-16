{{-- Index Footer template --}}

<footer class="page-footer">
    <section class="text">
        <p class="text-center">
            More information? <br>
            <a href="mailto:sales@2futures.com">sales@2futures.com</a>
            {{-- or <a href="tel:+23059774880">(+230) 5977 4880</a><br>
            <a href="http://2futures.com">2futures.com</a> --}}
        </p>
    </section>
    <section class="copyright">
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/2beach-club-blue-logo.webp') }}">
            <source media="(min-width: 700px)" srcset="{{ asset('img/2beach-club-blue-logo-2x.webp') }}">
            <img src="{{ asset('img/2beach-club-blue-logo.webp') }}" alt="2Beach-Club">
        </picture>
        <p class="text-center">
            {{ date('Y') }}© Two Futures Realty, Ltd. All rights reserved
        </p>
    </section>
</footer>
