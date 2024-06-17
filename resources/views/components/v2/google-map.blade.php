{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class) id="{{ $id ?? null }}">

    <div class="row">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center mb-3">Find us</h2>
        </div>
    </div>

    <div class="row px-0">
        <div class="col-12 overflow-hidden">

            <a href="https://maps.app.goo.gl/SjDLW1kLE8xxx1mL6" target="_blank">

                <img class="img-fluid lazy-load-image w-100"
                    src="{{ asset('v2/img/google-map-1.webp') }}"
                    data-src="{{ asset('v2/img/google-map.webp') }}"
                    alt=""
                />

            </a>

        </div>
    </div>

</div>


@push('head')
    <style id="gmap--styles">
        #find-us .special-heading {
            font-size: 32px;
        }

        @media screen and (min-width: 576px) {
            #find-us {
                margin-bottom: 6% !important    ;
            }
        }
    </style>
@endpush
