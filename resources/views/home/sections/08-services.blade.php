{{-- Section 08: Services --}}

<section class="section section-8">
    <header>
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/08-services-man-and-woman-on-boat-640x992.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/08-services-man-and-woman-on-boat-1536x1322.webp') }}">
            <img src="{{ asset('img/08-services-man-and-woman-on-boat-640x992.webp') }}" alt="Man-and-woman-on-boat">
        </picture>
        <picture class="img-container border">
            <source media="(max-width: 699px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-256x393.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-1340x980.webp') }}">
            <img src="{{ asset('img/08-services-man-and-woman-at-reception-256x393.webp') }}" alt="Man-and-woman-at-reception">
        </picture>
        <h2 class="special-heading">
            <span class="elt">Serv</span>
            <span class="elt">ices</span>
        </h2>
    </header>
    <main>
        <p>
            Our concierge team makes your life hassle-free.
            Let us book your day trips and catamaran cruises. Feel like a bit of deep-sea fishing? We can arrange that too.
        </p>
        <p>
            Don’t forget to ask us for recommendations about new restaurants or activities on the island!
        </p>
    </main>
    <footer>
        @include('home._partials.contact-button')
    </footer>
</section>
