{{-- membership --}}

@php
    $id = $id ?? 'membership-icon';
@endphp

<svg id="{{ $id }}" data-name="{{ $id }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 188.67 188.67"
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
            <path class="cls-1-{{ $id }}"
                d="M94.33,1.49C43.05,1.49,1.49,43.05,1.49,94.33s41.56,92.84,92.84,92.84,92.84-41.57,92.84-92.84S145.61,1.49,94.33,1.49ZM124.9,132.25h-61.38v-12.63c0-11.99,8.86-21.92,20.39-23.57,1.11-.16,2.25-.24,3.41-.24h13.78c1.23,0,2.44.09,3.63.27,11.42,1.75,20.17,11.62,20.17,23.54v12.63Z" />
            <g>
                <path class="cls-2-{{ $id }}"
                    d="M161.82,109.71v12.63h-36.92v-2.72c0-11.92-8.75-21.79-20.17-23.54,4.29-6.15,11.43-10.17,19.51-10.17h13.78c13.14,0,23.8,10.66,23.8,23.8Z" />
                <circle class="cls-2-{{ $id }}" cx="131.13" cy="70.76" r="14.34" />
                <path class="cls-2-{{ $id }}"
                    d="M83.91,96.05c-11.53,1.65-20.39,11.58-20.39,23.57v2.72H26.84v-12.63c0-13.14,10.66-23.8,23.8-23.8h13.78c8.06,0,15.19,4.01,19.49,10.14Z" />
                <circle class="cls-2-{{ $id }}" cx="57.54" cy="70.76" r="14.34" />
                <path class="cls-2-{{ $id }}"
                    d="M124.9,119.62v12.63h-61.38v-12.63c0-11.99,8.86-21.92,20.39-23.57,1.11-.16,2.25-.24,3.41-.24h13.78c1.23,0,2.44.09,3.63.27,11.42,1.75,20.17,11.62,20.17,23.54Z" />
                <circle class="cls-2-{{ $id }}" cx="94.21" cy="80.66" r="14.34" />
            </g>
        </g>
    </g>
</svg>
