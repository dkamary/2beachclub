{{-- Section 06: Roof top --}}

<section class="section section-6">
    <header>
        <picture class="img-container border">
            <source media="(max-width: 699px)" srcset="{{ asset('img/06-roof-top-girls-talking-442x618.webp') }}">
            <img src="{{ asset('img/06-roof-top-girls-talking-442x618.webp') }}" alt="Roof-top-girls-talking">
        </picture>
        @mobile
        <picture class="img-container border">
            <source media="(max-width: 699px)" srcset="{{ asset('img/06-roof-top-people-partying-480x368.webp') }}">
            <img src="{{ asset('img/06-roof-top-people-partying-480x368.webp') }}" alt="Roof-top-people-partying">
        </picture>
        @endmobile
        @handheld
        <h2 class="special-heading">
            <span class="elt">Roof</span>
            <span class="elt">Top</span>
        </h2>
        @endhandheld
    </header>
    <main>
        @desktop
        <h2 class="special-heading">
            <span class="elt">Roof</span>
            <span class="elt">Top</span>
        </h2>
        @enddesktop
        <p>
            Who can resist a rooftop sundowner?
        </p>
        <p>
            At the 2Beach Club, rack up unforgettable moments with the mesmerising colours of the sunset as a backdrop to those special meet-ups with family and friends.
        </p>
    </main>
</section>
