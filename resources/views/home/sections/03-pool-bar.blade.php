{{-- Section 3: Pool bar --}}

<section class="section section-3">
    <header>
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/03-pool-bar-cocktail-640x1358.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/03-pool-bar-cocktail-1536x3002.webp') }}">
            <source media="(min-width: 1200px)" srcset="{{ asset('img/03-pool-bar-cocktail-2880x3486.webp') }}">
            <img src="{{ asset('img/03-pool-bar-cocktail-640x1358.webp') }}" alt="Pool-Bar-Cocktail" width="320" height="679">
        </picture>
        <picture class="img-container border">
            <source media="(max-width: 699px)" srcset="{{ asset('img/03-pool-bar-girl-swimming-436x356.webp') }}">
            <img src="{{ asset('img/03-pool-bar-girl-swimming-436x356.webp') }}" alt="Pool-Bar-Girl-swimming" width="262" height="217">
        </picture>
        <h2 class="special-heading">
            <span class="elt">Pool</span>
            <span class="elt">Bar</span>
        </h2>
    </header>
    <main>
        @handheld
        <p>
            Members flock to 2Beach Club to enjoy the day in the sun and treat themselves to delicious international cuisine meals and creative cocktails.
        </p>
        <p>
            Our mixologists serve you the highest quality drinks with an innovative touch.
        </p>
        <p>
            Enjoy the beach days suntanning on oversized plush daybeds, relaxing and chilling to the all-day tunes with your family and friends.
        </p>
        @elsehandheld
            <div class="main-text">
                <p>
                    Members flock to 2Beach Club to enjoy the day in the sun and treat themselves to delicious international cuisine meals and creative cocktails.
                </p>
                <p>
                    Our mixologists serve you the highest quality drinks with an innovative touch.
                </p>
                <p>
                    Enjoy the beach days suntanning on oversized plush daybeds, relaxing and chilling to the all-day tunes with your family and friends.
                </p>
            </div>
            <picture class="img-container border">
                <source media="(min-width: 1200px)" srcset="{{ asset('img/03-pool-bar-girls-1140x1154.webp') }}">
                <img src="{{ asset('img/03-pool-bar-girls-1140x1154.webp') }}" alt="Pool-bar-girls" width="561" height="581">
            </picture>
            @include('home._partials.contact-button')
        @endhandheld
    </main>
    @handheld
    <footer>
        @include('home._partials.contact-button')
    </footer>
    @endhandheld
</section>
