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
    $bgContainerClass = array_merge(['col-12', 'overflow-hidden',], $bgContainerClass ?? ['px-0']);

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

<section id="{{ $id }}" @class($mainClass)>

    @if ($bgImage)

        <header class="row bg-content">
            <div @class($bgContainerClass)>
                @isset($link)
                    <a href="{{ $link }}" target="{{ $linkTarget ?? '_self' }}">
                @endisset
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
                @isset($link)
                    </a>
                @endisset
            </div>
        </header>

    @endif

    <main class="row text-content">
        <div @class($textClasses)>

            {{ $slot }}

        </div>
    </main>
</section>

@once
    @push('head')
        <style id="section-styles">
            .section-v2 {
                margin-top: 3rem;
                margin-bottom: 3rem;
            }

            .text-content {
                position: relative;
                margin-top: 5%;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
            }

            @media screen and (min-width: 576px) {
                .text-content {
                    /* position: absolute; */
                    margin-top: -10%;
                }

                .section-v2 {
                    margin-top: 3rem;
                    margin-bottom: 3rem;
                }
            }
        </style>
    @endpush
@endonce
