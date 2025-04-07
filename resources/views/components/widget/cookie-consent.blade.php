{{-- Cookie consent --}}

@props([
    'id' => 'cookie-consent',
    'class' => '',
])

@once

    @push('foot')
        <div id="{{ $id ?? 'cookie-consent' }}" class="cookie-consent-banner {{ $class ?? ''}}">
            <div class="row">
                <div class="col-12">
                    <p class="text-center" style="text-wrap: balance;">
                        {!! __('consent.text') !!}
                    </p>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="button-container">
                        <button class="btn btn-dark me-3" onclick="acceptConsent()">{!! __('consent.accept') !!}</button>
                        <button class="btn btn-outline-dark" onclick="refuseConsent()">{!! __('consent.refuse') !!}</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('foot')
        <script id="cookie-consent-script">
            document.addEventListener('DOMContentLoaded', function() {
                const consent = getCookie('cookie-consent');
                console.debug('Cookie consent:', consent);
                if (!consent) {
                    document.getElementById('{{ $id }}').style.display = 'block';
                } else {
                    document.getElementById('{{ $id }}').style.display = 'none';
                }
            });
        </script>
    @endpush

@endonce
