{{-- layout v2 --}}

@php
    $heroHeader = $heroHeader ?? false;
    $bodyClasses = array_merge(['layout-v2'], $bodyClasses ?? []);
@endphp

@if($heroHeader)
    <x-widget.header-v2 />
@endif

<main>{{ $slot }}</main>

<x-widget.footer />

@push('body_class'){{ implode(' ', $bodyClasses) }}@endpush
