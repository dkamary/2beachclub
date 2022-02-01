{{-- Index page --}}

@extends('_layouts.base')

@section('header')
    @include('home._partials.header')
@endsection

@section('main')
    @include('home.sections.01-live-the-5-stars.section')
    @include('home.sections.02-membership-advantages.section')
    @include('home.sections.03-pool-bar.section')
@endsection

@section('footer')
    @include('home._partials.footer')
@endsection
