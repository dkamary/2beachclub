{{-- Membership Mobile --}}

<div id="membership-mobile">
    @foreach (config('membership') as $key => $membership)

        <div @class([
            'row', 'membership-item',
            'mt-5' => !$loop->first
        ]) id="{{ $key }}">
            <div class="col-12">
                <h3 class="special-heading">{!! str_replace(['<br>', '<br />'], '&nbsp;', $membership['title']) !!}</h3>
            </div>
        </div>

        @foreach ($membership as $option => $value)

            @if ($option != 'title')

                <div @class([
                    'row', 'border-top', 'py-2', 'd-flex', 'align-items-center',
                    'bg-light' => $loop->even,
                    'border-bottom' => $loop->last,
                ])>
                    <div class="col-6 ps-4">
                        <strong class="fw-semibold">{!! __('membership.' . $option) !!}</strong>
                    </div>
                    <div class="col-6 ps-4">

                        @if (is_bool($value))
                            {{ $value ? 'Yes' : 'No' }}
                        @elseif (is_null($value))
                            {{ '-' }}
                        @elseif (is_int($value))
                            {{ number_format($value, 0, ' ', '.') }}
                        @elseif (is_float($value))
                            {{ $value * 100 }}&percnt;
                        @else
                            {!! $value !!}
                        @endif

                    </div>
                </div>

            @endif

        @endforeach

    @endforeach
</div>

@push('head')

    <style id="membership--style">
        .membership-item {
            background-color: #3f9caa;
        }

        .membership-item .special-heading {
            color: #ffffff !important;
            padding: .8rem .3rem;
        }
    </style>

@endpush
