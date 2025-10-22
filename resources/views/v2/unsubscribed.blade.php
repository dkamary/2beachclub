@php
    // header
    $headerBg = asset('v2/img/beach/Beach-1-1.webp');
    $headerTitle = $title ?? 'Newsletter';

    // content
    // $contentBg = asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview.webp');
    // $contentBgMini = asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-catering-header-preview-1.webp');
@endphp

@extends('_layouts.base')

@section('popup')
    @include('_partials.popup')
@endsection

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ $headerBg }}" :title="$headerTitle" :icon="true">

        <div class="container bg-white my-5">
            <h2 class="mb-5 pb-5 text-center text-muted">
                @if (isset($result) && !empty($result?->getMessage() ?? null))
                    {!! $result->getMessage() !!}
                @else
                    <span>You have been unsubscribed from 2Beach Club newsletters.</span>
                @endif
            </h2>
        </div>

        <x-v2.upcoming-events id="upcoming-events" :class="['container', 'bg-white', 'my-5']" />

    </x-layout.v2>
@endsection
