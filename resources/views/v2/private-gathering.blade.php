{{-- v2/private-gathering --}}

@php
    // header
    $headerBg = asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-weddings-pereybere-mauritius-header-page.webp');
    $headerTitle = 'Private Gatherings';

    // content
    $contentBg = asset('v2/img/restaurant/2beach-club-restaurant-sea-view.webp');
    $contentBgMini = asset('v2/img/restaurant/2beach-club-restaurant-sea-view-1.webp');
@endphp

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ $headerBg }}" title="" :icon="false">

        <div class="container bg-white my-5">

            <x-widget.section
                :id="$id ?? null"
                :lazyload="true"
                {{-- :bg-image="$contentBg"
                :bg-image-mini="$contentBgMini" --}}
                :bg-class="['w-100']"
                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-11 col-md-10 mx-auto"
            >

                <div class="row mb-3">
                    <div class="col-12">

                        <h1 class="special-heading fs-1 fw-bold text-center pb-2">{!! $headerTitle !!}</h1>

                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-12">
                        <p>
                            Whether you're planning a corporate gathering, an intimate celebration, or your dream wedding, 2Beach Club provides exceptional
                            options to make your event truly unforgettable. Located in the picturesque Pereybere in the north of Mauritius, a cherished
                            spot for both tourists and locals, our venue is ideal for your special occasion.
                        </p>
                        <p>
                            At 2Beach Club, we offer a variety of exclusive spaces, including an elegant restaurant, a stunning poolside area,
                            a breathtaking beachfront, a rooftop venue, and a private meeting space that can be customized to meet your needs.
                            Enjoy captivating ocean views and stunning sunsets as the perfect backdrop for your event.
                        </p>
                        <p>
                            Our dedicated team offers personalized catering services and packages, from lavish buffets and gourmet finger
                            foods to bespoke themed menus, ensuring a perfect culinary experience tailored to your event.
                        </p>
                    </div>

                </div>

                <div class="row my-4 g-3">

                    <div class="col-12 col-sm-6">
                        <a href="{{ route('event_weddings_and_celebrations') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Weddings & Celebrations</h2>
                            <img
                                data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-square.webp') }}"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-square-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6">
                        <a href="{{ route('event_meetings') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Meetings &<br class="d-none d-sm-block d-lg-none"> Events</h2>
                            <img data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square.webp') }}"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                </div>

            </x-widget.section>

        </div>

    </x-layout.v2>
@endsection

@push('head')
    <style id="private-gathering--styles">
        .text-overlapping {
            margin-top: -10rem;
        }

        @media screen and (max-width: 576px) {
            .text-overlapping {
                margin-top: unset;
            }
        }
    </style>
@endpush
