{{-- Index page --}}

@extends('_layouts.base')

@section('header')
    @include('home._partials.header')
@endsection

@section('main')
    @include('home.sections.01-live-the-5-star')
    @include('home.sections.02-membership-advantages')
    @include('home.sections.03-pool-bar')
    @include('home.sections.04-restaurant')
    @include('home.sections.05-business-hub')
    @include('home.sections.06-roof-top')
    @include('home.sections.07-events')
    @include('home.sections.08-services')
@endsection

@section('footer')
    @include('home._partials.footer')
@endsection

@once
    @push('head')
    <link
        href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=DM+Serif+Display:ital@0;1&display=swap"
        as="style"
        rel="preload"
        onload="this.onload=null;this.rel='stylesheet'"
    >
    @endpush
@endonce
