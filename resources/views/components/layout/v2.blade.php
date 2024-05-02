{{-- layout v2 --}}

@php
    $heroHeader = $heroHeader ?? false;
@endphp

@if($heroHeader)
    <x-widget.header-v2 />
@endif

{{ $slot }}

<x-widget.footer />
