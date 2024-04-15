{{-- Présentation du restaurant --}}

@php
    $class = array_merge(['container'], $class ?? []);
@endphp

<div @class($class)>

    <div class="row my-4">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center pb-3" style="font-size: 60px;">Restaurant</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 p-0">
            <img class="img-fluid lazy-load-image" src="{{ asset('v2/img/2beach-club-nice-food-mini.webp') }}" data-src="{{ asset('v2/img/2beach-club-nice-food.webp') }}" alt="">
        </div>
    </div>

    <div class="row mb-3 mt-n5 position-relative">
        <div class="col-12 offset-0 col-md-6 offset-md-5 d-flex justify-content-center align-items-center bg-white p-3 flex-column shadow   ">
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


</div>
