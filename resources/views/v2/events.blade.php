{{-- v2/home --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ get_asset($event->header_image, asset('v2/img/2BC-Sunset-Header.webp')) }}" :title="$event->title">

        <div class="container bg-white my-5">

            <x-widget.section
                :id="$id ?? null"
                :lazyload="true"
                :bg-image="get_asset($event->content_image, asset('v2/img/2BC-sunset-session-full.webp'))"
                :bg-image-mini="get_asset($event->content_image_thumb, asset('v2/img/2BC-sunset-session-mini.webp'))"
                :bg-class="['w-100']"
                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-11 col-md-10 mx-auto"
            >

                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="special-heading fs-1 fw-bold text-center pb-2">{!! $event->title !!}</h2>
                        <h3 class="special-heading fs-5 fw-semibold text-center pb-3">{{ $event->opening_days }}: {{ format_time($event->opening_time) }} - {{ format_time($event->closing_time) }}</h3>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-12">
                        {!! $event->content !!}
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-12 two-buttons">
                        @unless (empty($event->book_link))
                            <x-widget.book />
                        @endunless

                        @unless (empty($event->menu_link))
                            <div class="btn-container contact-button book-table my-4">
                                <a href="{{ get_link($event->menu_link) }}" class="text-uppercase">
                                    Menu
                                </a>
                            </div>
                        @endunless
                    </div>

                </div>

            </x-widget.section>

        </div>

    </x-layout.v2>
@endsection

@push('head')
    <style id="events--styles">
        .two-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: 0.6s;
        }

        @media screen and (min-width: 576px) {
            .two-buttons {
                flex-direction: row;
                justify-content: space-evenly;
            }
        }
    </style>
@endpush
