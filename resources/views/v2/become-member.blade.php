{{-- v2/home --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" title="Become a member" :bg-image="asset('v2/img/membership/2beach-club-services.webp')">

        <section class="container">

            <header class="row mb-5">
                <div class="col-12">
                    <h1 class="special-heading" id="membership-title">Welcome to 2Beach Club - <br class="d-block d-sm-none"> A Beachside Haven!</h1>
                </div>

                <p class="col-12 mt-5">
                    Thank you for expressing your interest in 2Beach Club, where every moment is a treasure to behold.
                    As you step into a world of coastal luxury and indulgence, we are delighted to offer you the
                    opportunity to become a part of our esteemed membership community.
                </p>
            </header>

            <main>

                <div class="row g-3 mb-5">
                    <div class="col-12">
                        <h2 class="special-heading fs-2">Discover each membership</h2>
                    </div>
                    @foreach (config('membership_tiers.tiers') as $tierCard)
                        @continue(!($tierCard['enabled'] ?? true))
                        <div class="col-12">
                            <div class="membership-banner"
                                 style="background-image: url({{ asset($tierCard['hero']) }}); --band: {{ $tierCard['band'] }};">
                                <div class="membership-banner__text">
                                    <strong>{{ $tierCard['label'] }}</strong>
                                    <span>{{ $tierCard['subtitle'] }}</span>
                                </div>
                                {{-- Same button as the home page (BOOK TABLE / SEE OUR MENUS) --}}
                                <div class="btn-container contact-button book-table membership-banner__cta">
                                    <a href="{{ route($tierCard['route']) }}" class="text-uppercase stretched-link"
                                       aria-label="Learn more about {{ $tierCard['label'] }}">
                                        Learn more
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Membership table, new presentation (previous: x-v2.membership) --}}
                <div class="row">
                    <div class="col-12">
                        <x-v2.membership-comparison />
                    </div>
                </div>

            </main>

            <footer></footer>

        </section>

    </x-layout.v2>
@endsection

@section('popup')
    @include('_partials.popup')
@endsection

@push('head')
    <style id="membership-banners">
        .membership-banner {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            min-height: 180px;
            padding: 2rem 2.5rem;
            background-size: cover;
            background-position: center;
            color: #fff;
            text-decoration: none;
            overflow: hidden;
        }

        /* Tier colour at ~70% + soft dark gradient on the text side for contrast */
        .membership-banner::before,
        .membership-banner::after {
            content: "";
            position: absolute;
            inset: 0;
        }

        .membership-banner::before {
            background-color: var(--band);
            opacity: .7;
            transition: opacity .4s;
        }

        .membership-banner::after {
            background: linear-gradient(90deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0) 70%);
        }

        .membership-banner:hover::before { opacity: .8; }

        .membership-banner__text {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            text-shadow: 0 1px 4px rgba(0, 0, 0, .45);
        }

        .membership-banner__text strong {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: 2rem;
            line-height: 1.1;
        }

        .membership-banner__text span {
            font-size: 1.05rem;
            margin-top: .35rem;
        }

        /* Home page button (see x-widget.book), placed above the overlays */
        .btn-container.membership-banner__cta {
            z-index: 1;
            flex-shrink: 0;
            margin: 0;
        }

        .btn-container.contact-button.book-table.membership-banner__cta a {
            border-radius: 1.5rem;
            border: none;
            box-shadow: none;
            padding: 4px 0.6rem;
            min-width: 240px;
            text-align: center;
        }

        .btn-container.membership-banner__cta a:focus-visible { outline: 3px solid #fff; outline-offset: 3px; }

        @media (max-width: 575px) {
            .membership-banner {
                flex-direction: column;
                align-items: flex-start;
                min-height: 160px;
                padding: 1.5rem;
            }

            .membership-banner__text strong { font-size: 1.6rem; }
        }
    </style>
@endpush


{{-- @push('foot')
    <script id="membership--scripts">
        window.addEventListener("DOMContentLoaded", function(){
            const target = document.querySelector("#membership-title");
            if (!target) {
                console.warn("Unable to select the membership target");
                return;
            }

            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    </script>
@endpush --}}
