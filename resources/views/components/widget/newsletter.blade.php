{{-- Newsletter form --}}

@php
    $id = $id ?? 'newsletter';
    $title = $title ?? 'Stay informed. Subscribe to our newsletter.';
@endphp

<div id="{{ $id }}-form-container"></div>

{{-- <form id="{{ $id }}" action="{{ $action ?? route('newsletter_subscribe') }}" method="post" {{ $attributes->class(['form-newsletter']) }}>

    <div class="row mb-3">
        <div class="col-12 text-center">
            <h4 class="special-heading fs-5">{!! $title !!}</h4>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-6 pe-1">
            <input type="text" name="name"
                required
                class="form-control"
                placeholder="{{ $placeholder ?? 'Your first name' }}"
                aria-label="{{ $placeholder ?? 'Your first name' }}">
        </div>
        <div class="col-6 ps-1">
            <input type="text" name="last_name"
                required
                class="form-control"
                placeholder="{{ $placeholder ?? 'Your last name' }}"
                aria-label="{{ $placeholder ?? 'Your last name' }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <input type="email" name="email" class="form-control"
                required
                class="form-control"
                placeholder="{{ $placeholder ?? 'Your email address' }}"
                aria-label="{{ $placeholder ?? 'Your email address' }}">
        </div>
    </div>

    <div class="row mb-3" style="display: none;">
        <div class="col-12">
            <input type="text" name="reflex" class="form-control"
                class="form-control"
                placeholder="{{ $placeholder ?? 'Your comment' }}"
                aria-label="{{ $placeholder ?? 'Your comment' }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-primary w-100 text-uppercase" type="submit" id="btn-submit">{!! $butttonLabel ?? 'Subscribe' !!}</button>
        </div>
    </div>

    <input type="hidden" name="referral_url" value="{{ request()->headers->get('referrer', $_SERVER['HTTP_REFERER'] ?? null) }}">

    {{-- <div class="g-recaptcha" data-sitekey="{{ config('2beachclub.recaptcha.key') }}" data-callback="onSubmit"></div>

    @csrf

</form> --}}

@once

    @push('head')

        <style id="newsletter--styles">

            .form-newsletter button[type="submit"] {
                border-color: #3f9caa !important;
                background-color: #3f9caa !important;
                color: #fff;
                font-size: 1.1em;
                transition: 0.6s;
            }

            .form-newsletter button[type="submit"]:hover {
                background-color: #3f9caa !important;
                color: #ffffff !important;
            }

            .form-newsletter input {
                border-color: #3f9caa !important;
                /* border-right: none !important; */
            }

        </style>

        {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}

    @endpush

    @push('foot')
        <script id="newsletter-lazy-load" defer async>
            window.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    newsletter_load_forms();
                }, 5000);
            });

            function newsletter_load_forms() {
                const formContainer = document.getElementById('{{ $id }}-form-container');
                const form = `
                    <form id="{{ $id }}" action="{{ $action ?? route('newsletter_subscribe') }}" method="post" class="form-newsletter">
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <h4 class="special-heading fs-5">{!! $title !!}</h4>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 pe-1">
                                <input type="text" name="name" required class="form-control" placeholder="{{ $placeholder ?? 'Your first name' }}" aria-label="{{ $placeholder ?? 'Your first name' }}">
                            </div>
                            <div class="col-6 ps-1">
                                <input type="text" name="last_name" required class="form-control" placeholder="{{ $placeholder ?? 'Your last name' }}" aria-label="{{ $placeholder ?? 'Your last name' }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="email" name="email" required class="form-control" placeholder="{{ $placeholder ?? 'Your email address' }}" aria-label="{{ $placeholder ?? 'Your email address' }}">
                            </div>
                        </div>
                        <div class="row mb-3" style="display: none;">
                            <div class="col-12">
                                <input type="text" name="reflex" class="form-control" placeholder="{{ $placeholder ?? 'Your comment' }}" aria-label="{{ $placeholder ?? 'Your comment' }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button class="btn btn-primary w-100 text-uppercase" type="submit" id="btn-submit">{!! $butttonLabel ?? 'Subscribe' !!}</button>
                            </div>
                        </div>
                        <input type="hidden" name="referral_url" value="{{ request()->headers->get('referrer', $_SERVER['HTTP_REFERER'] ?? null) }}">
                        @csrf
                    </form>
                `;
                formContainer.innerHTML = form;
                console.debug('Newsletter form loaded');
            }
        </script>
    @endpush

@endonce
