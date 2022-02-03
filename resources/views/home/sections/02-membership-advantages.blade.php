{{-- Section 02: Membership advantages --}}

<section class="section section-2">
    <header>
        <picture class="img-container">
            <source media="(max-width: 699px)" srcset="{{ asset('img/section-2-1-320x456.webp') }}">
            <source media="(max-width: 1199px)" srcset="{{ asset('img/02-membership-1536x1178.webp') }}">
            <source media="(min-width: 1200px)" srcset="{{ asset('img/02-membership-1524x2394.webp') }}">
            <img src="{{ asset('img/section-2-1-320x456.webp') }}" alt="" width="320" height="456">
        </picture>
        @mobile
        <h2 class="special-heading">
            <span class="elt">Mem</span>
            <span class="elt">bership</span>
            <span class="elt">advantages</span>
        </h2>
        @endmobile
    </header>
    <main>
        <div class="title-content">
            <h2 class="special-heading">
                <span class="elt">Mem</span><span class="elt">ber</span><span class="elt">ship</span><span class="elt">advantages</span>
            </h2>
        </div>
        <div class="main-content">
            <h3>
                The benefits of having exclusive membership to 2Beach Club set your property apart.
            </h3>
            <p>
                You can be sure of celebrating even more than life itself when you see the investment and rental yields 2Beach Club adds.
            </p>
            <p>
                Enjoy the proximity to the stunning blue lagoon, coupled with typically warm, friendly service. It’s all designed to encourage you to linger longer.
            </p>
            <ul>
                <li>Catamaran and speed boat for your private use</li>
                <li>Shuttle service from your home to the club</li>
                <li>Business hub</li>
                <li>Private event venue</li>
                <li>Special events for members</li>
                <li>Concierge service</li>
                <li>Airport transfer</li>
            </ul>
        </div>
        @desktop
        @include('home._partials.contact-button')
        @enddesktop
    </main>
    @handheld
    <footer>
        @include('home._partials.contact-button')
    </footer>
    @endhandheld
</section>
