{{-- Section component --}}

@php
    $id = $id ?? uniqid('section-');
    $mainClass = array_merge(['section-v2', 'position-relative'], $mainClass ?? []);

    // Background Image
    $lazyload = $lazyload ?? false;
    $bgImage = $bgImage ?? false;
    $bgImageMini = $bgImageMini ?? false;
    $bgImageAlt = $bgImageAlt ?? '';
    $bgClass = array_merge(['img-fluid'], $bgClass ?? []);

    // Text
    $textPlacement = $textPlacement ?? 'right';
    $textSize = $textSize ?? '2/3';
    $textClasses = ['col'];

    if ($textSize == '2/3') {

        $textClasses = ['col-12', 'col-md-8'];

        if ($textPlacement == 'right') $textClasses[] = 'offset-0 offset-md-4';
        elseif ($textPlacement == 'center') $textClasses[] = 'offset-0 offset-md-2';

    } elseif ($textSize == '1/3') {

        $textClasses = ['col-12', 'col-md-4'];

        if ($textPlacement == 'right') $textClasses[] = 'offset-0 offset-md-8';
        elseif ($textPlacement == 'center') $textClasses[] = 'offset-0 offset-md-4';

    } elseif ($textSize == '1/2') {

        $textClasses = ['col-12', 'col-md-6'];

        if ($textPlacement == 'right') $textClasses[] = 'offset-0 offset-md-6';
        elseif ($textPlacement == 'center') $textClasses[] = 'offset-0 offset-md-3';

    } elseif ($textSize == '1/1') {

        $textClasses = ['col-12'];

    } else {

        $textClasses = explode(' ', $textSize);

    }

    if (isset($textClass) && !empty($textClass)) $textClasses = array_merge($textClasses, $textClass ?? []);
    $textClasses[] = 'p-4';

@endphp

<div id="{{ $id }}" @class($mainClass)>

    @if ($bgImage)

        <div class="row bg-content">
            <div class="col-12 px-0">
                <img
                    @if ($lazyload)
                        data-src="{{ $bgImage }}"
                        src="{{ $bgImageMini }}"
                        @class(array_merge($bgClass, ['lazy-load-image']))
                    @else
                        src="{{ $bgImage }}"
                        @class($bgClass)
                    @endif
                alt="{{ $bgImageAlt }}" />
            </div>
        </div>

    @endif

    <div class="row text-content">
        <div @class($textClasses)>

            {{ $slot }}

        </div>
    </div>
</div>

@once
    @push('head')
        <style id="section-styles">
            .section-v2 {
                margin-bottom: 15%;
            }

            .text-content {
                position: absolute;
                bottom: -25%;
                width: 100%;
            }
        </style>
    @endpush
@endonce
