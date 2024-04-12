{{-- Stylesheets --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link
    href="{{ asset('css/app.css') }}"
    {{-- as="style" --}}
    rel="stylesheet"
    {{-- onload="this.onload=null;this.rel='stylesheet'" --}}
>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=DM+Serif+Display:ital@0;1&display=swap"
    as="style"
    rel="preload"
    onload="this.onload=null;this.rel='stylesheet'"
>
<link rel="stylesheet" href="{{ asset('css/lazyload.css') }}">
<style>
    .mt-n1 {
        margin-top: -1rem;
    }

    .mt-n2 {
        margin-top: -2rem;
    }

    .mt-n3 {
        margin-top: -3rem;
    }

    .mt-n4 {
        margin-top: -4rem;
    }

    .mt-n5 {
        margin-top: -5rem;
    }

    .mb-n1 {
        margin-bottom: -1rem;
    }

    .mb-n2 {
        margin-bottom: -2rem;
    }

    .mb-n3 {
        margin-bottom: -3rem;
    }

    .mb-n4 {
        margin-bottom: -4rem;
    }

    .mb-n5 {
        margin-bottom: -5rem;
    }
</style>
