{{-- Rooftop --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <div class="row">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center pb-3" style="font-size: 60px;">Rooftop</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <img class="img-fluid lazy-load-image" src="https://fakeimg.pl/60x90/" data-src="https://fakeimg.pl/600x900/?text=Rooftop+Drone+View" alt="">
        </div>
        <div class="col-12 col-md-6 pe-5 d-flex justify-content-center align-items-center flex-column">
            <p>
                Who can resist a rooftop sundowner with a cocktail in hand?
                At the 2Beach Club, experience unforgettable moments as the captivating colors of the sunset serve as the backdrop for your family and friends gatherings.
            </p>
            <p>
                Sip craft cocktails prepared by our talented mixologists. From refreshing classics to innovative creations, our rooftop bar offers a tempting selection of cocktails.
            </p>
            <p>
                As you raise a glass to the beauty of the moment, take in the panoramic views that stretch as far as the eye can see, with the sparkling ocean below and the vibrant hues of the sky above.
            </p>
            <x-widget.book />
        </div>
    </div>

</div>
