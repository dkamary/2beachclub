{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <div class="row">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center pb-3" style="font-size: 60px;">Events</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 px-5 d-flex justify-content-center align-items-center flex-column">
            <p>
                2Beach Club offers an exquisite setting for your private receptions and corporate meetings.
            </p>
            <p>
                Our esteemed members enjoy the privilege of reserving our club for a wide range of events and gatherings.
            </p>
            <p>
                From intimate celebrations to high-stakes boardroom meetings, our team is dedicated to ensuring that every occasion is orchestrated with meticulous attention to detail and unparalleled style.
            </p>
            <p>
                Experience the epitome of sophistication and hospitality at 2Beach Club, where your events are transformed into unforgettable moments of excellence.
            </p>
        </div>

        <div class="col-12 col-md-6">
            <img class="img-fluid lazy-load-image" src="https://fakeimg.pl/60x90/" data-src="https://fakeimg.pl/600x900/?text=Events" alt="">
        </div>

    </div>

</div>
