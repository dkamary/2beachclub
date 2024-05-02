{{-- v2/home --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true">

        <x-v2.intro id="home" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.opening-hours id="opening-hours" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.restaurant-presentation id="restaurant" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.beach-pool id="beach-and-pool" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.events id="events" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.upcoming-events id="upcoming-events" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.gallery id="gallery" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.contact-us id="contact-us" :class="['container', 'bg-white', 'py-5']" />
        <x-v2.google-map id="find-us" :class="['container', 'bg-white', 'py-5']" />

    </x-layout.v2>
@endsection

