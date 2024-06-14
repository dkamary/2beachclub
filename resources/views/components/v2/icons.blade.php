{{-- Icons --}}

@php
    $home = $home ?? route('home');
@endphp

<div {{ $attributes->merge(['class' => 'row icon-container']) }}>

    @if ($slot->isEmpty())

        <div class="col-4 col-sm-2 d-flex my-3 align-items-center">
            <a href="{{ $home }}#restaurant" class="text-center d-flex flex-column align-items-center justify-content-center w-100 icon-and-text">
                <img src="{{ asset('v2/svg/Restaurant.svg') }}" alt="restaurant" width="135" class="icon-item" />
                {{-- <x-icon.restaurant width="135" height="80" class="img-fluid" /> --}}
                <span>Restaurant</span>
            </a>
        </div>

        <div class="col-4 col-sm-2 d-flex my-3 align-items-center">
            <a href="{{ $home }}#beach-and-pool" class="text-center d-flex flex-column align-items-center justify-content-center w-100 icon-and-text">
                <img src="{{ asset('v2/svg/Beach.svg') }}" alt="restaurant" width="135" class="icon-item" />
                {{-- <x-icon.beach width="135" height="80" class="img-fluid" /> --}}
                <span>Beach & Pool</span>
            </a>
        </div>

        <div class="col-4 col-sm-2 d-flex my-3 align-items-center">
            <a href="{{ $home }}#events" class="text-center d-flex flex-column align-items-center justify-content-center w-100 icon-and-text">
                <img src="{{ asset('v2/svg/Events.svg') }}" alt="restaurant" width="135" class="icon-item" />
                {{-- <x-icon.event width="135" height="80" class="img-fluid" /> --}}
                <span>Events</span>
            </a>
        </div>

        <div class="col-4 col-sm-2 d-flex my-3 align-items-center">
            <a href="{{ route('booking_tracking') }}" class="text-center d-flex flex-column align-items-center justify-content-center w-100 icon-and-text">
                <img src="{{ asset('v2/svg/Reservation.svg') }}" alt="restaurant" width="135" class="icon-item" />
                {{-- <x-icon.reservation width="135" height="80" class="img-fluid" /> --}}
                <span>Reservation</span>
            </a>
        </div>

        <div class="col-4 col-sm-2 d-flex my-3 align-items-center">
            <a href="{{ $home }}#find-us" class="text-center d-flex flex-column align-items-center justify-content-center w-100 icon-and-text">
                <img src="{{ asset('v2/svg/Location.svg') }}" alt="restaurant" width="135" class="icon-item" />
                {{-- <x-icon.location width="135" height="80" class="img-fluid" /> --}}
                <span>Find us</span>
            </a>
        </div>

        <div class="col-4 col-sm-2 d-flex my-3 align-items-center">
            <a href="{{ route('become_member') }}" class="text-center d-flex flex-column align-items-center justify-content-center w-100 icon-and-text">
                <img src="{{ asset('v2/svg/Membership.svg') }}" alt="restaurant" width="135" class="icon-item" />
                {{-- <x-icon.membership width="135" height="80" class="img-fluid" /> --}}
                <span>Become a member</span>
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
                align-items: flex-start;
            }

            .icon-container .icon-item {
                width: 75%;
                height: auto;
            }

            .icon-container .icon-and-text {
                color: #58c6cd;
                text-decoration: none;
                font-size: 14px;
                font-weight: 600;
            }

            .icon-container .icon-and-text span {
                display: block;
                margin-top: 10px;
            }

            @media screen and (min-width: 576px) {
                .icon-container {
                    align-items: flex-start;
                }

                .icon-container .icon-item {
                    width: 50%;
                    height: auto;
                }

                .icon-container .icon-and-text {
                    font-size: 20px;
                }
            }
        </style>
    @endpush

@endonce
