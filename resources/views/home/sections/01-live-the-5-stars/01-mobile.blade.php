{{-- Section 01: Live the 5-stars lifestyle everyday - MOBILE --}}

<section class="section section-1">
    <header>
        <h1 class="special-heading">
            <span class="elt">2Beach Club by 2Futures</span>
            <span class="elt">Live</span>
            <span class="elt">the</span>
            <span class="elt">5</span>
            <span class="elt">-star</span>
            <span class="elt">lifestyle</span>
            <span class="elt">everyday</span>
        </h1>
    </header>
    <main>
        <picture class="img-container">
            <source media="(min-width: 320px)" srcset="{{ asset('img/section-1-1-320w.webp') }}">
            <img src="{{ asset('img/section-1-1-640w.jpg') }}" alt='section-1-1-320w.jpg' title="Located in Grand Baie along the white sandy beach of Pereybere." width="320" height="361">
        </picture>
        <div class="first-text">
            <p>Located in Grand Baie along the white sandy beach of Pereybere.</p>
            <p>Get exclusive access today. Find out how.</p>
        </div>
        <picture class="img-container border black-white">
            <source media="(min-width: 320px)" srcset="{{ asset('img/content-img-bw.webp') }}">
            <img src="{{ asset('img/content-img-bw.jpg') }}" alt="" width="320" height="469">
        </picture>
        <div class="main-content">
            <h2>
                Life in Mauritius is all about having fun in the sun.
            </h2>
            <p>
                Dip your toes in the sand with an exotic drink in your hand while the gentle sea breeze and the movement of waves cajole your senses.
            </p>
            <p>
                Exclusive to 2Futures homeowners, the 2Beach Club is on the stretch of white sand of Pereybere beach.
            </p>
            <p>
                Experience the barefoot luxury at the pool restaurant & bar with contemporary architecture style brought to you by SAOTA.
            </p>
            <h2>
                This is the 2Beach Club experience.
            </h2>
        </div>
    </main>
    <footer>
        @include('home._partials.contact-button')
    </footer>
</section>
