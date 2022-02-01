{{-- Section 3 : MOBILE --}}

<section class="section section-3">
    <header>
        <picture class="img-container">
            <source media="(min-width: 320px)" srcset="{{ asset('img/section-3-1-800w.webp') }}">
            <img src="{{ asset('img/section-3-1-800w.webp') }}" alt="" width="320" height="625">
        </picture>
        <picture class="img-container border">
            <source media="(min-width: 320px)" srcset="{{ asset('img/content-3-2.webp') }}">
            <img src="{{ asset('img/content-3-2.webp') }}" alt="" width="320" height="261">
        </picture>
        <picture class="img-container">
            <source media="(min-width: 320px)" srcset="{{ asset('img/section-3-3-800w.webp') }}">
            <img src="{{ asset('img/section-3-3-800w.webp') }}" alt="" width="320" height="241">
        </picture>
        <h2 class="special-heading">
            <span class="elt">Pool</span>
            <span class="elt">Bar</span>
        </h2>
    </header>
    <main>
        <p>
            Members flock to 2Beach Club to enjoy the day in the sun and treat themselves to delicious international cuisine meals and creative cocktails.
        </p>
        <p>
            Our mixologists serve you the highest quality drinks with an innovative touch.
        </p>
        <p>
            Enjoy the beach days suntanning on oversized plush daybeds, relaxing and chilling to the all-day tunes with your family and friends.
        </p>
    </main>
    <footer>
        @include('home._partials.contact-button')
    </footer>
</section>
