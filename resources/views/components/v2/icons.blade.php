{{-- Icons --}}

@php
    $home = $home ?? route('home');
@endphp

<div {{ $attributes->merge(['class' => 'row icon-container']) }}>

    @if ($slot->isEmpty())

        <div class="col-4 col-sm-1 d-flex justify-content-center align-items-center mb-3">
            <a href="{{ $home }}#restaurant">
                <img src="{{ asset('v2/img/restaurant.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-4 col-sm-1 d-flex justify-content-center align-items-center mb-3">
            <a href="{{ $home }}#beach-and-pool">
                <img src="{{ asset('v2/img/beach-and-pool.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-4 col-sm-1 d-flex justify-content-center align-items-center mb-3">
            <a href="{{ $home }}#events">
                <img src="{{ asset('v2/img/events.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-4 col-sm-1 d-flex justify-content-center align-items-center mb-3">
            <a href="{{ route('booking_tracking') }}">
                <img src="{{ asset('v2/img/reservation.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-4 col-sm-1 d-flex justify-content-center align-items-center mb-3">
            <a href="{{ $home }}#find-us">
                <img src="{{ asset('v2/img/find-us.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-4 col-sm-1 d-flex justify-content-center align-items-center mb-3">
            <a href="{{ route('become_member') }}">
                <img src="{{ asset('v2/img/Become a member.webp') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

    @else

        {{ $slot }}

    @endif


</div>

@once


    @push('head')
        <style id="icons--styles">
            .icon-container {
                display: flex;
                justify-content: space-around;
                align-items: center;
            }

            @media screen and (min-width: 576px) {
                .icon-container {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                }
            }
        </style>
    @endpush

@endonce
