{{-- Newsletter form --}}

@php
    $id = $id ?? 'newsletter';
    $title = $title ?? 'Stay informed. Subscribe to our newsletter.';
@endphp

<form id="{{ $id }}" action="{{ $action ?? route('newsletter_subscribe') }}" method="post" {{ $attributes->class(['form-newsletter']) }}>

    <div class="row mb-3">
        <div class="col-12 text-center">
            <h4 class="special-heading fs-5">{!! $title !!}</h4>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <div class="input-group">
                <input type="email" name="email"
                    required
                    class="form-control"
                    placeholder="{{ $placeholder ?? 'Your email address' }}"
                    aria-label="{{ $placeholder ?? 'Your email address' }}"
                    aria-describedby="btn-submit">
                <button class="btn btn-outline-primary" type="submit" id="btn-submit">{!! $butttonLabel ?? 'Subscribe' !!}</button>
              </div>
        </div>
    </div>

    <input type="hidden" name="referral_url" value="{{ request()->headers->get('referrer', $_SERVER['HTTP_REFERER'] ?? null) }}">

    @csrf

</form>

@once

    @push('head')

        <style id="newsletter--styles">

            .form-newsletter button[type="submit"] {
                border-color: #3f9caa !important;
                color: #3f9caa !important;
                transition: 0.6s;
            }

            .form-newsletter button[type="submit"]:hover {
                background-color: #3f9caa !important;
                color: #ffffff !important;
            }

            .form-newsletter input[type="email"] {
                border-color: #3f9caa !important;
                border-right: none !important;
            }

        </style>

    @endpush

@endonce
