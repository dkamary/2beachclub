{{-- Google Analytics --}}

@php
    $key = $key ?? 'G-KE6G8QJN02';
@endphp

@once

    <script>
        const CONSENT_COOKIE_NAME = 'cookie-consent';
        const CONSENT_GRANTED = 'granted';
        const CONSENT_DENIED = 'denied';

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function hideCookieConsent() {
            document.getElementById('cookie-consent').style.display = 'none';
        }

        function acceptConsent() {
            hideCookieConsent();
            setCookie(CONSENT_COOKIE_NAME, 'accepted', 365);
            gtag('consent', 'update', {
                'ad_user_data': CONSENT_GRANTED,
                'ad_personalization': CONSENT_GRANTED,
                'ad_storage': CONSENT_GRANTED,
                'analytics_storage': CONSENT_GRANTED
            });
        }

        function refuseConsent() {
            hideCookieConsent();
            setCookie(CONSENT_COOKIE_NAME, 'refused', 365);
            gtag('consent', 'update', {
                'ad_user_data': CONSENT_DENIED,
                'ad_personalization': CONSENT_DENIED,
                'ad_storage': CONSENT_DENIED,
                'analytics_storage': CONSENT_DENIED
            });
        }
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $key }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        // Consent
        const consentStatus = getCookie(CONSENT_COOKIE_NAME);
        const consentValue = consentStatus == 'accepted' ? CONSENT_GRANTED : CONSENT_DENIED;
        gtag('consent', 'default', {
            'ad_storage': consentValue,
            'ad_user_data': consentValue,
            'ad_personalization': consentValue,
            'analytics_storage': consentValue,
            'wait_for_update': 500
        });

        gtag('config', '{{ $key }}', {
            'url_passthrough': true
        });
    </script>

@endonce
