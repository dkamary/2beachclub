{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class) id="{{ $id ?? null }}">

    <div class="row">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center mb-4" style="font-size: 60px;">Gallery</h2>
        </div>
    </div>

    <div class="row g-3">

        @for ($i = 1; $i <= 8; $i++)

            <div class="col-12 col-md-3 overflow-hidden">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-' . str_pad($i, 3, '0', STR_PAD_LEFT) . '.webp') }}"
                        src="{{ asset('v2/img/gallery-' . str_pad($i, 3, '0', STR_PAD_LEFT) . '-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

        @endfor

    </div>

</div>
