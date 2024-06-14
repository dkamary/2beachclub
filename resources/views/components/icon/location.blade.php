{{-- location --}}

@php
    $id = $id ?? 'location-icon';
@endphp

<svg id="{{ $id }}" data-name="{{ $id }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 479.54 188.67"
    @isset($width)width="{{ $width }}"@endisset
    @isset($height)width="{{ $height }}"@endisset
    @isset($class)class="{{ $class }}"@endisset
>
    <defs>
        <style>
            .cls-1-{{ $id }} {
                stroke-width: 2.99px;
            }

            .cls-1-{{ $id }},
            .cls-2-{{ $id }} {
                fill: none;
                stroke: #58c6cd;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .cls-2-{{ $id }} {
                stroke-width: 2.3px;
            }
        </style>
    </defs>
    <g id="{{ $id }}-2" data-name="{{ $id }}-2">
        <g>
            <g>
                <g>
                    <circle class="cls-1-{{ $id }}" cx="385.2" cy="85.53" r="14.78"
                        transform="translate(52.35 297.43) rotate(-45)" />
                    <circle class="cls-1-{{ $id }}" cx="385.2" cy="85.53" r="6.34" />
                </g>
                <path class="cls-1-{{ $id }}"
                    d="M425.33,82.74c0-23.1-19.52-41.65-42.97-40.03-20.05,1.38-36.18,17.81-37.23,37.88-.69,13.17,4.98,25.03,14.21,32.82h0s.02.02.03.02c.08.07.16.14.24.21,2.22,1.94,17.73,15.85,23.76,31.16.65,1.66,3.02,1.66,3.68,0,6.02-15.31,21.54-29.22,23.76-31.16.08-.07.16-.14.24-.21,0,0,.03-.02.03-.02h0c8.72-7.36,14.26-18.37,14.26-30.67Z" />
            </g>
            <circle class="cls-1-{{ $id }}" cx="385.2" cy="94.34" r="92.84" />
        </g>
        <g>
            <path class="cls-2-{{ $id }}"
                d="M136.13,111.74v12.63h-36.92v-2.72c0-11.92-8.75-21.79-20.17-23.54,4.29-6.15,11.43-10.17,19.51-10.17h13.78c13.14,0,23.8,10.66,23.8,23.8Z" />
            <path class="cls-2-{{ $id }}"
                d="M58.22,98.08c-11.53,1.65-20.39,11.58-20.39,23.57v2.72H1.15v-12.63c0-13.14,10.66-23.8,23.8-23.8h13.78c8.06,0,15.19,4.01,19.49,10.14Z" />
        </g>
    </g>
</svg>
