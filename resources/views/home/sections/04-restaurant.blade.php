{{-- Section 04: Restaurant --}}

<section class="section section-4">
    <header>
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/04-restaurant-drink-and-fruits-640x1084.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/04-restaurant-wine-and-fruits-1536x1568.webp') }}">
            <img src="{{ asset('img/04-restaurant-drink-and-fruits-640x1084.webp') }}" alt="Restaurant-drink-and-fruits" width="320" height="542">
        </picture>
        <picture class="img-container border">
            <source media="(max-width: 699px)" srcset="{{ asset('img/04-restaurant-man-being-served-531x797.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/04-restaurant-man-being-served-1057x1644.webp') }}">
            <img src="{{ asset('img/04-restaurant-man-being-served-531x797.webp') }}" alt="Restaurant-man-being-served" width="320" height="480">
        </picture>
        <h2 class="special-heading">
            <span class="elt">Rest</span>
            <span class="elt">aurant</span>
        </h2>
    </header>
    <main>
        <p>
            Feeling peckish after a swim?
        </p>
        <p>
            No worries… We have a poolside menu!
        </p>
        <p>
            Our chef's gourmet menu features healthy salads, sushi, fresh seafood selection and more.
        </p>
        <p>
            You’ll be tempted to taste it all – breakfast, lunch and dinner!
        </p>
        <p>
            Sundays are for brunch: our buffet stations are abundant with a range of delicious salads, cold cuts, cheeses and desserts.
        </p>
        <p>
            Our rich wine selection created by our experienced sommelier joyfully elevates your food journey at the club.
        </p>
    </main>
    <footer>
        @include('home._partials.contact-button')
    </footer>
</section>
