{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);
    $id = $id ?? uniqid('upcoming-events');

@endphp

<div @class($class) id="{{ $id }}">

    <div class="row">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center mb-4">Upcoming events</h2>
        </div>
    </div>

    <div class="row g-3">

        <div class="col-12 col-sm-7 col-lg-4 mb-4-nope mx-auto">
            <x-widget.section
                :lazyload="true"
                :bg-image="asset('v2/img/sunset-session.webp')"
                :bg-image-mini="asset('v2/img/sunset-session-1.webp')"
                :bg-class="['w-100']"
                :bg-container-class="[]"
                :main-class="['mb-0']"
                link="{{ route('events') }}"

                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-10 mx-auto"
            >

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading fw-bold text-center" style="font-size: 32px;">Sunset Session</h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <p>
                            <strong class="d-block my-2">Every Friday</strong>
                            17.30 - 20.30
                        </p>
                    </div>

                    <div class="col-12 my-2 text-center">
                        <x-widget.book />
                    </div>

                </div>

            </x-widget.section>
        </div>

        <div class="col-12 col-sm-7 col-lg-4 mb-4-nope mx-auto">
            <x-widget.section
                :lazyload="true"
                :bg-image="asset('v2/img/spanish-night.webp')"
                :bg-image-mini="asset('v2/img/spanish-night-1.webp')"
                :bg-class="['w-100']"
                :bg-container-class="[]"
                :main-class="['mb-0']"
                link="{{ route('events') }}"

                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-10 mx-auto"
            >

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading fw-bold text-center" style="font-size: 32px;">Saturday Sounds</h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <p>
                            <strong class="d-block my-2">Every Saturday</strong>
                            17.00 - 20.00
                        </p>
                    </div>

                    <div class="col-12 my-2 text-center">
                        <x-widget.book />
                    </div>

                </div>

            </x-widget.section>
        </div>

        <div class="col-12 col-sm-7 col-lg-4 mb-4-nope mx-auto">
            <x-widget.section
                :lazyload="true"
                :bg-image="asset('v2/img/sunday-brunch.webp')"
                :bg-image-mini="asset('v2/img/sunday-brunch-1.webp')"
                :bg-class="['w-100']"
                :bg-container-class="[]"
                :main-class="['mb-0']"
                link="{{ route('events') }}"

                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-10 mx-auto"
            >

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading fw-bold text-center" style="font-size: 32px;">Sunday Brunch</h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <p>
                            <strong class="d-block my-2">Every Sunday</strong>
                            10.00 - 15.00
                        </p>
                    </div>

                    <div class="col-12 my-2 text-center">
                        <x-widget.book />
                    </div>

                </div>

            </x-widget.section>
        </div>

    </div>

</div>

@push('head')

    <style id="{{ $id }}--styles">

        #{{ $id }} .special-heading {
            font-size: 32px;
        }


        @media screen and (min-width: 576px) {
            #{{ $id }} .special-heading {
                font-size: 60px;
            }
        }

    </style>

@endpush
