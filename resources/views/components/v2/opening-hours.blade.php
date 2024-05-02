{{-- Opening Hours --}}

@php
    $class = $class ?? [];
@endphp

<div @class($class)>

    <x-widget.section
        :lazyload="true"
        :bg-image="asset('v2/img/opening-hour.webp')"
        :bg-image-mini="asset('v2/img/opening-hour-1.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="center"
        text-size="col-11 col-md-10 mx-auto"
    >

        <div class="row mb-3">
            <div class="col-12">
                <h2 class="special-heading fs-1 fw-bold text-center pb-3">Opening hours</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center flex-column">
                <div class="hours text-center mb-2">
                    <span class="fs-3">10</span><span class="fs-5">AM</span> - <span class="fs-3">7</span><span class="fs-5">PM</span>
                </div>
                <div class="days text-center mb-2">
                    <span class="fs-3 fw-bold text-uppercase">Mon</span> - <span class="fs-3 fw-bold text-uppercase">Fri</span>
                </div>
            </div>
            <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center flex-column">
                <div class="hours text-center mb-2">
                    <span class="fs-3">12</span><span class="fs-5">AM</span> - <span class="fs-3">7</span><span class="fs-5">PM</span>
                </div>
                <div class="days text-center mb-2">
                    <span class="fs-3 fw-bold text-uppercase">Sat</span>
                </div>
            </div>
            <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center flex-column">
                <div class="hours text-center mb-2">
                    <span class="fs-3">10</span><span class="fs-5">AM</span> - <span class="fs-3">1</span><span class="fs-5">PM</span>
                </div>
                <div class="days text-center mb-2">
                    <span class="fs-3 fw-bold text-uppercase">Sun</span>
                </div>
            </div>
        </div>

    </x-widget.section>

</div>
