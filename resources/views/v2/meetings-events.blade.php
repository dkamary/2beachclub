{{-- v2/private-gathering --}}

@php
    // header
    $headerBg = asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-header.webp');
    $headerTitle = 'Meetings & Events';

    // content
    $contentBg = asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview.webp');
    $contentBgMini = asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview-1.webp');
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
                        <h2 class="special-heading fs-5 fw-semibold text-center py-3">Elevate Your Corporate Meetings and Events at 2Beach Club</h2>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-12">
                        <p>
                            Transform your corporate meetings and events into memorable experiences at 2Beach Club, where work and leisure blend seamlessly.
                            Our venue offers a unique combination of professional and relaxing atmospheres, perfect for inspiring creativity and enhancing
                            collaboration among your team and business partners.
                        </p>
                        <p>
                            Located in the serene surroundings of Pereybere in northern Mauritius, 2Beach Club boasts a variety of exclusive spaces.
                            Whether you're hosting a small meeting or a larger conference, our versatile setups are tailored to meet your specific needs.
                            From our elegant restaurant and stunning poolside area to our breathtaking beachfront, each venue provides a unique setting
                            that complements your event's theme and objectives.
                        </p>

                        <div class="row mt-5 mb-4">
                            <img class="img-fluid w-100 lazy-load-image"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview-1.webp') }}"
                                data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview.webp') }}">
                        </div>

                        <p>
                            In addition to our beautiful locations, our renowned catering services offer an array of options,
                            from gourmet finger foods to lavish buffets, all crafted to delight your guests.
                            Our dedicated team works closely with you to customize every detail, ensuring that your event is not only productive
                            but also enjoyable and memorable.
                        </p>

                        <p>
                            Experience the perfect blend of professional efficiency and coastal charm at 2Beach Club, where every event is
                            crafted to leave a lasting impression on you and your guests.
                        </p>
                        <p>
                            Please contact us to learn more about our offerings or schedule a visit to experience the exceptional ambiance and facilities of 2Beach Club.
                        </p>
                        <div class="d-flex justify-content-center">
                            <div class="btn-container contact-button book-table my-4">
                                <a href="{{ route('home') }}#contact-us" class="text-uppercase">
                                    Contact us
                                </a>
                            </div>
                        </div>
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
