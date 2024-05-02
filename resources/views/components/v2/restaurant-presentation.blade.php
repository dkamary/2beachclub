{{-- Présentation du restaurant --}}

@php
    $class = array_merge(['container'], $class ?? []);
@endphp

<div @class($class)>

    <x-widget.section
        :lazyload="true"
        :bg-image="asset('v2/img/restaurant-presentation.webp')"
        :bg-image-mini="asset('v2/img/restaurant-presentation-1.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="right"
        text-size="2/3"
    >

        <div class="row my-4">
            <div class="col-12">
                <h2 class="special-heading fw-bold text-left" style="font-size: 60px;">Restaurant</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <p>
                    Hungry after a refreshing dip? <br>
                    No problem! Dive into our beach Club delights! <br>
                    Our chef-curated menu showcases fresh salads, delectable sushi, a bounty of fresh seafood, and so much more. From lunch to dinner, our offerings will seduce your taste buds and leave you craving for more!
                    And Sundays? They're made for indulgent brunches! <br>
                    Complementing your culinary adventure is our exquisite wine selection, meticulously crafted by our seasoned sommelier. It's the perfect pairing to elevate your experience at the club! <br>
                </p>
                <x-widget.book />
            </div>
        </div>

    </x-widget.section>

    <div class="row g-3">

        <div class="col-12 col-md-3">
            <a href="#">
                <img src="{{ asset('v2/img/restaurant-001-1.webp') }}" data-src="{{ asset('v2/img/restaurant-001.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
            </a>
        </div>

        <div class="col-12 col-md-3">
            <a href="#">
                <img src="{{ asset('v2/img/restaurant-002-1.webp') }}" data-src="{{ asset('v2/img/restaurant-002.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
            </a>
        </div>

        <div class="col-12 col-md-3">
            <a href="#">
                <img src="{{ asset('v2/img/restaurant-003-1.webp') }}" data-src="{{ asset('v2/img/restaurant-003.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
            </a>
        </div>

        <div class="col-12 col-md-3">
            <a href="#">
                <img src="{{ asset('v2/img/restaurant-004-1.webp') }}" data-src="{{ asset('v2/img/restaurant-004.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
            </a>
        </div>

    </div>

</div>
