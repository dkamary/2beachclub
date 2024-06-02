{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <x-widget.section
        :id="$id ?? null"
        :lazyload="true"
        :bg-image="asset('v2/img/events-large.webp')"
        :bg-image-mini="asset('v2/img/events-small.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="right"
        text-size="2/3"
    >

        <div class="row">
            <div class="col-12">
                <h2 class="special-heading fw-bold text-center" style="font-size: 60px;">Events</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p>
                    2Beach Club offers an exquisite setting for your private receptions and corporate meetings.
                </p>
                <p>
                    Our esteemed members enjoy the privilege of reserving our club for a wide range of events and gatherings.
                    From intimate celebrations to high-stakes boardroom meetings, our team is dedicated to ensuring that every occasion is orchestrated with meticulous attention to detail and unparalleled style.
                    Experience the epitome of sophistication and hospitality at 2Beach Club, where your events are transformed into unforgettable moments of excellence.
                </p>
            </div>

        </div>

    </x-widget.section>

</div>
