{{-- Services --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <div class="row">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center pb-3" style="font-size: 60px;">Services</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <img class="img-fluid lazy-load-image w-100" src="https://fakeimg.pl/120x50/" data-src="https://fakeimg.pl/1200x500/?text=Services" alt="">
        </div>

        <div class="col-12 col-md-5 offset-md-4 mt-n5 bg-white p-5">
            <p>
                Transfer from your residence to teh 2Beach Club
            </p>
            <p>
                Concierge service
            </p>
        </div>

    </div>

</div>
