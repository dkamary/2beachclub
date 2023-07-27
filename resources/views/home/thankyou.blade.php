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
                Thank you for expressing your interest in 2Beach Club.
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
            .landingpage-section-1 ol li {
                margin-bottom: 12px;
            }

            .membership-table-container {
                display: flex;
                flex-wrap: wrap;
            }

            .membership-table-container .left-side,
            .membership-table-container .right-side {
                position: relative;
            }

            .membership-table-container .left-side {
                width: 70%;
            }

            .membership-table-container .right-side {
                width: 30%;
            }

            .membership-table-container .position-sticky {
                position: sticky;
                top: 16px;
            }

            .landingpage-section-1 {
                padding: 45px 10px;
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

            .landingpage-section-1 ol {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .membership-table-container {
                margin-top: 48px;
                margin-bottom: 24px;
            }

            .contact-form-update {
                display: flex;
                justify-content: center;
                align-items: center;
                padding-top: 24px;
                padding-bottom: 24px;
            }

            @media screen and (max-width: 576px) {
                .membership-table-container .left-side,
                .membership-table-container .right-side {
                    width: 100%;
                }

                .membership-table-container .left-side {
                    order: 2;
                }

                .membership-table-container .right-side {
                    order: 1;
                }
            }
        </style>
    @endpush
@endonce
