{{-- Beach and Pool --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <x-widget.section
        :id="$id ?? null"
        :lazyload="true"
        :bg-image="asset('v2/img/beach-and-pool-full.webp')"
        :bg-image-mini="asset('v2/img/beach-and-pool-thumbnail.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="right"
        text-size="2/3"
    >

        <div class="row">
            <div class="col-12">
                <h2 class="special-heading fw-bold text-center" style="font-size: 60px">Beach & Pool</h2>
            </div>
        </div>

        <div class="row">

            <div class="col-12" style="">
                <p>
                    Whether you're sipping cocktails by the sea, enjoying delicious tapas or simply soaking up the scenery, our beachside experience promises to be nothing short of extraordinary. <br>
                    Welcome to your very own paradise by the sea!
                    Relax on our sun loungers in the shade of the parasols and let the rhythm of the waves gently seduce you as you revel in the beauty of our seaside retreat. Take advantage of our towel service to ensure you have everything you need.
                    With direct beach access from the 2Beach Club, set your foot on the warm sand and feel the touch of the sun on your skin as you explore. With convenient access just steps away, immerse yourself in the serene beauty of the coastline.
                    Escape to seaside luxury today!
                </p>
            </div>

        </div>

    </x-widget.section>

    @handheld
        <div class="slick-carousel">

            <div class="">
                <a href="#">
                    <img src="{{ asset('v2/img/2bc-gallery-01-1.webp') }}" data-src="{{ asset('v2/img/2bc-gallery-01.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="">
                <a href="#">
                    <img src="{{ asset('v2/img/2bc-gallery-02-1.webp') }}" data-src="{{ asset('v2/img/2bc-gallery-02.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="">
                <a href="#">
                    <img src="{{ asset('v2/img/restaurant-003-1.webp') }}" data-src="{{ asset('v2/img/restaurant-003.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="">
                <a href="#">
                    <img src="{{ asset('v2/img/restaurant-004-1.webp') }}" data-src="{{ asset('v2/img/restaurant-004.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

        </div>
    @elsehandheld
        <div class="row g-3">

            <div class="col-12 col-md-3">
                <a href="#">
                    <img src="{{ asset('v2/img/2bc-gallery-01-1.webp') }}" data-src="{{ asset('v2/img/2bc-gallery-01.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="#">
                    <img src="{{ asset('v2/img/2bc-gallery-02-1.webp') }}" data-src="{{ asset('v2/img/2bc-gallery-02.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
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
    @endhandheld

</div>

@once

    @push('head')

        <style id="beach-and-pool--styles">
            #beach-and-pool {
                margin-bottom: 3%;
                margin-top: 30% !important;
            }

            @media screen and (min-width: 576px) {
                #beach-and-pool {
                    margin-bottom: unset;
                    margin-top: 8% !important;
                }
            }

        </style>
    @endpush

@endonce
