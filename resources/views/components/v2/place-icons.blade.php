{{-- Place icons --}}

@php
    $classes = array_merge(['row', 'd-flex', 'flex-wrap', 'justify-content-center',], $classes ?? []);
@endphp

<div @class($class ?? [])>

    <div @class($classes)>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/Beach access.png') }}" alt="Beach access" title="Beach access" class="privileges-img-fluid" loading="lazy" />
        </div>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/Concierge.png') }}" alt="Concierge" title="Concierge" class="privileges-img-fluid" loading="lazy" />
        </div>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/Boardroom.png') }}" alt="Boardroom" title="Boardroom" class="privileges-img-fluid" loading="lazy" />
        </div>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/pool.png') }}" alt="Pool" title="Pool" class="privileges-img-fluid" loading="lazy" />
        </div>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/Shuttle.png') }}" alt="Shuttle" title="Shuttle" class="privileges-img-fluid" loading="lazy" />
        </div>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/Locker room.png') }}" alt="Locker room" title="Locker room" class="privileges-img-fluid" loading="lazy" />
        </div>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/restaurant.png') }}" alt="Restaurant" title="Restaurant" class="privileges-img-fluid" loading="lazy" />
        </div>
        <div class="col-6 col-sm-4 col-md-3 d-flex mb-4 align-items-center justify-content-center">
            <img src="{{ asset('img/Rooftop-bar.webp') }}" alt="Rooftop-bar" title="Rooftop-bar" class="privileges-img-fluid" loading="lazy" />
        </div>
    </div>

</div>

@once

    @push('head')

        <style id="privileges--styles">
            .privileges-img-fluid {
                width: 100%;
                height: auto;
                max-width: 160px;
            }
        </style>

    @endpush

@endonce
