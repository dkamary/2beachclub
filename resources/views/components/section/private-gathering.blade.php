{{-- Private Gathering --}}

@php

    $class = array_merge(['container'], $class ?? []);
    $bgImage = asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-weddings-pereybere-mauritius-header.webp');
    $bgImageMini = asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-weddings-pereybere-mauritius-header-1.webp');
    $link = route('private_gathering');

@endphp

<div @class($class)>

    <x-widget.section
        :id="$id ?? null"
        :lazyload="true"
        :bg-image="$bgImage"
        :bg-image-mini="$bgImageMini"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="right"
        text-size="2/3"
    >

        <div class="row">
            <div class="col-12">
                <h2 class="special-heading fw-bold text-left">
                    <a href="{{ $link }}">Private Gatherings</a>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p>
                    Whether you're planning a corporate gathering, an intimate celebration, or your dream wedding,
                    2Beach Club provides exceptional options to make your event truly unforgettable.
                </p>
                <p>
                    We offer a variety of exclusive spaces, including an elegant restaurant, a stunning poolside area,
                    a breathtaking beachfront, a rooftop venue, and a private meeting space that can be customized to meet your needs.
                </p>
                <p class="my-4">
                    <a href="{{ $link }}">Discover more!</a>
                </p>
            </div>

        </div>

    </x-widget.section>

</div>

@push('head')

    <style id="events--styles">
        #private-gathering {
            margin-top: 8% !important;
        }

        @media screen and (min-width: 576px) {
            @media screen {
                #private-gathering {
                    margin-top: 8% !important;
                }
            }
        }
    </style>

@endpush
