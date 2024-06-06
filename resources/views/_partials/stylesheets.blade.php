{{-- Stylesheets --}}

<link href="{{ asset('v2/css/bootstrap.min.css') }}" rel="stylesheet">

{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="//fonts.googleapis.com/css2?family=Antic+Didone&family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=DM+Serif+Display:ital@0;1&display=swap"
    as="style"
    rel="preload"
    onload="this.onload=null;this.rel='stylesheet'"
>
<link rel="stylesheet" href="{{ asset('css/lazyload.css') }}">
@include('_partials.v2.typology')
@include('_partials.v2.margin')
@handheld
    <link rel="stylesheet" href="{{ asset('v2/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('v2/slick/slick-theme.css') }}">
@endhandheld
