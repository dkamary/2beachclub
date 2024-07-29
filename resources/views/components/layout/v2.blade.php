{{-- layout v2 --}}

@php
    $heroHeader = $heroHeader ?? false;
    $bodyClasses = array_merge(['layout-v2'], $bodyClasses ?? []);
    $icon = $icon ?? true;
@endphp

@if($heroHeader)
    <x-widget.header-v2 :bgImage="$bgImage ?? null" :title="$title ?? null" :icon="$icon" />
@endif

<main>{{ $slot }}</main>

<x-widget.footer />

@push('body_class'){{ implode(' ', $bodyClasses) }}@endpush
