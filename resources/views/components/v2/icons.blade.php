{{-- Icons --}}

@php
    $home = $home ?? route('home');
@endphp

<div {{ $attributes->merge(['class' => 'row d-flex justify-content-around align-items-center']) }}>

    @if ($slot->isEmpty())

        <div class="col-2 col-sm-1 d-flex justify-content-center align-items-center">
            <a href="{{ $home }}#restaurant">
                <img src="{{ asset('v2/img/restaurant.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-2 col-sm-1 d-flex justify-content-center align-items-center">
            <a href="{{ $home }}#beach-and-pool">
                <img src="{{ asset('v2/img/beach-and-pool.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-2 col-sm-1 d-flex justify-content-center align-items-center">
            <a href="{{ $home }}#events">
                <img src="{{ asset('v2/img/events.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-2 col-sm-1 d-flex justify-content-center align-items-center">
            <a href="{{ route('booking_tracking') }}">
                <img src="{{ asset('v2/img/reservation.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="col-2 col-sm-1 d-flex justify-content-center align-items-center">
            <a href="{{ $home }}#find-us">
                <img src="{{ asset('v2/img/find-us.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
            </a>
        </div>

        <div class="d-none col-2 col-sm-1 d-flex justify-content-center align-items-center">
            <a href="{{ route('become_member') }}">
                <img src="{{ asset('v2/img/Become a member@4x-8-2.webp') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
                <p class="text-center" style="color: #3f9caa;">Become member</p>
            </a>
        </div>

    @else

        {{ $slot }}

    @endif


</div>
