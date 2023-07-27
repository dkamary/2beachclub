{{-- Thank you page --}}
{{-- Index page --}}

@extends('_layouts.base')

@section('header')
    @include('home._partials.header2')
@endsection

@section('main')
    <section class="section landingpage-section-1">
        <header>
            <h1 id="membership-details">
                Thank you
            </h1>
        </header>
        <main>
            <p>
                Thank you for expressing your interest in 2Beach Club. We hope you have a marvellous experience!
            </p>
            <p style="margin-top: ">
                See you soon.
            </p>
            <p>
                <a href="{{ route('home_page') }}">
                    <img src="{{ asset('img/2beach-club-01.webp') }}" alt="2Beach Club" style="width: 100%; height: auto;">
                </a>
            </p>
        </main>
    </section>
@endsection

@section('footer')
    @include('home._partials.footer')
@endsection

@once
    @push('head')
        <style>

            .landingpage-section-1 {
                padding: 45px 10px;
                text-align: center;
            }

            .landingpage-section-1 h1 {
                font-size: 48px;
                line-height: 120%;
                margin-bottom: 24px;
            }

            .landingpage-section-1 h2 {
                font-size: 32px;
                line-height: 120%;
                margin-top: 24px;
                margin-bottom: 24px;
            }

        </style>
    @endpush
@endonce
