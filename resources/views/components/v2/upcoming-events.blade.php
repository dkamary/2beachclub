{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class) id="{{ $id ?? null }}">

    <div class="row g-3">

        <div class="col-12 col-md-4">
            <x-widget.section
                :lazyload="true"
                :bg-image="asset('v2/img/sunset-session.webp')"
                :bg-image-mini="asset('v2/img/sunset-session-1.webp')"
                :bg-class="['w-100']"
                :bg-container-class="[]"

                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-10 mx-auto"
            >

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading fw-bold text-center" style="font-size: 32px;">Sunset Session</h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <p>
                            Friday 8th April <br>
                            00.00 - 00.00
                        </p>
                    </div>

                    <div class="col-12 my-2 text-center">
                        <x-widget.book />
                    </div>

                </div>

            </x-widget.section>
        </div>

        <div class="col-12 col-md-4">
            <x-widget.section
                :lazyload="true"
                :bg-image="asset('v2/img/spanish-night.webp')"
                :bg-image-mini="asset('v2/img/spanish-night-1.webp')"
                :bg-class="['w-100']"
                :bg-container-class="[]"

                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-10 mx-auto"
            >

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading fw-bold text-center" style="font-size: 32px;">Spanish Night</h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <p>
                            Friday 8th April <br>
                            00.00 - 00.00
                        </p>
                    </div>

                    <div class="col-12 my-2 text-center">
                        <x-widget.book />
                    </div>

                </div>

            </x-widget.section>
        </div>

        <div class="col-12 col-md-4">
            <x-widget.section
                :lazyload="true"
                :bg-image="asset('v2/img/sunday-brunch.webp')"
                :bg-image-mini="asset('v2/img/sunday-brunch-1.webp')"
                :bg-class="['w-100']"
                :bg-container-class="[]"

                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-10 mx-auto"
            >

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading fw-bold text-center" style="font-size: 32px;">Sunday Brunch</h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <p>
                            Friday 8th April <br>
                            00.00 - 00.00
                        </p>
                    </div>

                    <div class="col-12 my-2 text-center">
                        <x-widget.book />
                    </div>

                </div>

            </x-widget.section>
        </div>

    </div>

</div>
