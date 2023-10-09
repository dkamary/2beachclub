{{-- Index page --}}

@extends('_layouts.base')

@section('main')
    <section id="coming-soon">
        <header style="text-align: center; margin: 2rem auto;">
            <a href="{{ route('home_page') }}" class="logo-link">
                <img src="{{ asset('img/2beach-club-blue-logo-2x.webp') }}" alt="2Beach-Club" title="2Beach Club" width="400" height="" style="width: 400px; height: auto; max-width: 100%;" />
            </a>
        </header>
        <main>
            <h1 style="margin-bottom: 1.5rem;">Website coming soon!</h1>
            <h2 style="margin-bottom: 1rem;">Book your table <a href="https://www.sevenrooms.com/reservations/2beachclub">here</a></h2>
            <h3 style="margin-bottom: 2rem;">
                For more information, call us on
                @handheld
                <br>
                @endhandheld
                <a href="tel:+2302621955">(+230) 262 19 55</a>
            </h3>
        </main>
    </section>
@endsection

@once
    @push('head')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
                font-weight: 300;
                width: 100%;
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-image: url({{ asset('img/2beach-club-01.webp') }});
            }

            .landingpage-section-1 ol li {
                margin-bottom: 12px;
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

            #coming-soon {
                background-color: #ffffff;
                padding: 2rem;
                border-radius: 15px;
                box-shadow: 0 4px 5px rgba(0, 0, 0, .3);
                max-width: 90%;
            }

            #coming-soon main h1,
            #coming-soon main h2,
            #coming-soon main h3 {
                text-align: center;
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
