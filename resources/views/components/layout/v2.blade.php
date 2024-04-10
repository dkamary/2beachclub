{{-- layout v2 --}}

@php
    $heroHeader = $heroHeader ?? false;
@endphp

@if($heroHeader)
    <x-widget.header>

        {{ $content ?? '' }}

    </x-widget.header>
@endif

{{ $slot }}

<x-widget.footer />
