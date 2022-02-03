{{-- Section 05: Business Hub --}}

<section class="section section-5">
    @handheld
    <header>
        <h2 class="special-heading">
            <div class="elt">Busi</div>
            <div class="elt">ness</div>
            <div class="elt">HUB</div>
        </h2>
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/05-business-hub-rinie-talking-to-client.webp') }}">
            <img src="{{ asset('img/05-business-hub-rinie-talking-to-client.webp') }}" alt="Business-hub-Rinie-talking-to-client">
        </picture>
    </header>
    @endhandheld
    <main>
        @desktop
        <div class="main-text">
            <h2 class="special-heading">
                <div class="elt">Busi</div>
                <div class="elt">ness</div>
                <div class="elt">HUB</div>
            </h2>
        @enddesktop
            <p>
                For guests needing some space in the cool interior, the club has a lounge on the 1st floor.
            </p>
            <p>
                A separate business hub is available during the day as well. This hub can turn into an event venue for private functions upon request.
            </p>
        @desktop
            @include('home._partials.contact-button')
        </div>
        <picture class="img-container">
            <source media="(min-width: 700px)" srcset="{{ asset('img/05-business-hub-rinie-talking-to-client-1444x1204.webp') }}">
            <img src="{{ asset('img/05-business-hub-rinie-talking-to-client-1444x1204.webp') }}" alt="Business-hub-Rinie-talking-to-client">
        </picture>
        @enddesktop
    </main>
    @handheld
    <footer>
        @include('home._partials.contact-button')
    </footer>
    @endhandheld
</section>
