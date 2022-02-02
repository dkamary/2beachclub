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
