{{-- Section 07: Events --}}

<section class="section section-7">
    <header>
        @mobile
        @elsemobile
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/06-roof-top-people-partying-480x368.webp') }}">
            <img src="{{ asset('img/06-roof-top-people-partying-480x368.webp') }}" alt="Roof-top-people-partying">
        </picture>
        @endmobile
        <h2 class="special-heading">
            Events
        </h2>
    </header>
    <main>
        <p>
            2Beach Club is befitting for private receptions and boardroom meetings.
        </p>
        <p>
            Members reserve the club for meetings and special events.
        </p>
        <p>
            Whether it’s a private celebration or corporate event, we’re here to make your every occasion happen in style!
        </p>
    </main>
    <footer>
        @include('home._partials.contact-button')
    </footer>
</section>
