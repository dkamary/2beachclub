@php
    // header
    $headerBg = asset('v2/img/beach/Beach-1-1.webp');
    $headerTitle = $title ?? 'Unexpected error*';

    // content
    // $contentBg = asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview.webp');
    // $contentBgMini = asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview-1.webp');
@endphp

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ $headerBg }}" :title="$headerTitle" :icon="false">

        <div class="container bg-white my-5">
            <h3 class="text-center">{!! $exception ?? 'Unexpected error *' !!}</h3>
        </div>

    </x-layout.v2>
@endsection
