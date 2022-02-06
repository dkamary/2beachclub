{{-- Section 08: Services --}}

<section class="section section-8">
    <header>
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/08-services-man-and-woman-on-boat-640x992.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/08-services-man-and-woman-on-boat-1536x1322.webp') }}">
            <source media="(min-width: 1200px)" srcset="{{ asset('img/08-services-man-and-woman-on-boat-2880x2494.webp') }}">
            <img src="{{ asset('img/08-services-man-and-woman-on-boat-640x992.webp') }}" alt="Man-and-woman-on-boat">
        </picture>
        @handheld
        <picture class="img-container border">
            <source media="(max-width: 699px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-256x393.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-1340x980.webp') }}">
            <source media="(min-width: 1200px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-1409x1848.webp') }}">
            <img src="{{ asset('img/08-services-man-and-woman-at-reception-256x393.webp') }}" alt="Man-and-woman-at-reception">
        </picture>
        <h2 class="special-heading">
            <span class="elt">Serv</span>
            <span class="elt">ices</span>
        </h2>
        @endhandheld
    </header>
    <main>
        @desktop
        <div class="main-content">
            <h2 class="special-heading">
                <span class="elt">Serv</span><span class="elt">ices</span>
            </h2>
        @enddesktop
            <p>
                Our concierge team makes your life hassle-free.
            </p>
            <p>
                Let us book your day trips and catamaran cruises.
            </p>
            <p>
                Feel like a bit of deep-sea fishing? We can arrange that too.
            </p>
            <p>
                Don’t forget to ask us for recommendations about new restaurants or activities on the island!
            </p>
        @desktop
            @include('home._partials.contact-button')
        </div>
        <picture class="img-container border">
            <source media="(max-width: 699px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-256x393.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-1340x980.webp') }}">
            <source media="(min-width: 1200px)" srcset="{{ asset('img/08-services-man-and-woman-at-reception-1409x1848.webp') }}">
            <img src="{{ asset('img/08-services-man-and-woman-at-reception-1409x1848.webp') }}" alt="Man-and-woman-at-reception">
        </picture>
        @enddesktop
    </main>
    @handheld
    <footer>
        @include('home._partials.contact-button')
    </footer>
    @endhandheld
</section>
