{{-- Google Analytics --}}

@php
    $key = $key ?? 'G-KE6G8QJN02';
@endphp

@once

<script async src="https://www.googletagmanager.com/gtag/js?id={{ $key }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());gtag('config', '{{ $key }}');
</script>

@endonce
