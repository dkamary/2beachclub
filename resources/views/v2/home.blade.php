{{-- v2/home --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true">



        <x-v2.intro :class="['container', 'bg-white', 'py-5']" />
        <x-v2.opening-hours :class="['container', 'bg-white', 'py-5']" />
        <x-v2.restaurant-presentation :class="['container', 'bg-white', 'py-5']" />
        <x-v2.beach-pool :class="['container', 'bg-white', 'py-5']" />
        {{-- <x-v2.rooftop :class="['container', 'bg-white', 'py-5']" /> --}}
        {{-- <x-v2.events :class="['container', 'bg-white', 'py-5']" /> --}} --}}
        {{-- <x-v2.services :class="['container', 'bg-white', 'py-5']" /> --}}
        {{-- <x-v2.place-icons :class="['container', 'bg-white', 'py-5']" />
        <x-v2.team :class="['container', 'bg-white', 'py-5']" /> --}}

    </x-layout.v2>
@endsection

