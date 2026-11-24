{{-- v2/membership/_layout : shared template of the membership tier pages --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" :title="$tier['title']" :bg-image="asset($tier['hero'])">

        {{-- Intro --}}
        <section class="container">
            <header class="row mb-4">
                <div class="col-12">
                    <h1 class="special-heading" id="membership-title">
                        {{ $tier['name'] }}@if ($tier['option']) &ndash; <span class="text-nowrap">{{ $tier['option'] }}</span>@endif
                    </h1>
                    <p class="mt-4 membership-tier-hook">@yield('hook')</p>
                </div>
            </header>
        </section>

        {{-- Summary banner --}}
        <section class="membership-tier-facts" style="background-color: {{ $tier['band'] }};">
            <div class="container">
                <div class="row g-0">
                    @foreach ($tier['facts'] as $label => $value)
                        <div class="col-6 col-md-3 membership-tier-fact">
                            <small>{{ $label }}</small>
                            <strong>{{ $value }}</strong>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Overview + benefits --}}
        <section class="container py-5">
            <div class="row g-5">
                <div class="col-12 col-lg-6">
                    <h2 class="special-heading fs-2 mb-4">Membership overview</h2>
                    @yield('overview')
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="special-heading fs-2 mb-4">Your benefits</h2>
                    <ul class="membership-tier-benefits">
                        @foreach ($tier['benefits'] as $key => $benefit)
                            @php
                                [$status, $note] = array_pad($benefit, 2, null);
                                $icon = ['yes' => '&#10003;', 'cond' => '!', 'no' => '&ndash;'][$status];
                                $note = $note ?? ($status === 'no' ? 'Not included' : '');
                            @endphp
                            <li class="is-{{ $status }}">
                                <span class="icon" aria-hidden="true">{!! $icon !!}</span>
                                <span>{{ $benefits[$key] }}</span>
                                <em>{{ $note }}</em>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        {{-- Gallery --}}
        <section class="container">
            <div class="row g-2 membership-tier-gallery">
                @foreach ($tier['gallery'] as $i => $image)
                    <div class="{{ $i === 0 ? 'col-12 col-md-6' : 'col-6 col-md-3' }}">
                        <img src="{{ asset($image) }}" alt="2Beach Club - {{ $tier['title'] }}" loading="lazy" class="img-fluid w-100">
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Contact form (tier preselected, options hidden) --}}
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center py-5" id="membership-form">
                    @include('home.forms.landing-page-contact', [
                        'membership' => $tier['value'],
                        'membershipLabel' => $tier['label'],
                    ])
                </div>
            </div>
        </div>

        {{-- Other tiers --}}
        <section class="container pb-5">
            <h2 class="special-heading fs-2 mb-4">Other memberships</h2>
            <div class="row g-3">
                @foreach ($tiers as $otherSlug => $other)
                    @continue($otherSlug === $slug)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{ route($other['route']) }}" class="membership-tier-card">
                            <strong>{{ $other['label'] }}</strong>
                            <span>{{ $other['subtitle'] }}</span>
                            <span>{{ $other['facts']['Annual fee'] === 'None' ? 'No fee' : $other['facts']['Annual fee'] . ' / year' }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <p class="mt-4 fst-italic"><small>*Day membership packages will be on offer, depending on availability and at the discretion of the management.</small></p>
        </section>

    </x-layout.v2>
@endsection

@section('popup')
    @include('_partials.popup')
@endsection

@push('head')
    <style id="membership-tier">
        #membership-title { text-wrap: balance; }
        .membership-tier-hook { font-size: 1.2rem; }
        .membership-tier-facts { color: #fff; }
        .membership-tier-fact { padding: 1.25rem 1.5rem; border-right: 1px solid rgba(255, 255, 255, .15); }
        .membership-tier-fact:last-child { border-right: 0; }
        .membership-tier-fact small { display: block; font-size: .7rem; letter-spacing: .14em; text-transform: uppercase; opacity: .8; }
        .membership-tier-fact strong { font-family: 'DM Serif Display', serif; font-weight: 400; font-size: 1.6rem; }
        .membership-tier-benefits { list-style: none; margin: 0; padding: 0; border-top: 1px solid #e3eaee; }
        .membership-tier-benefits li { display: grid; grid-template-columns: 28px 1fr auto; gap: .75rem; align-items: start; padding: .7rem 0; border-bottom: 1px solid #e3eaee; }
        .membership-tier-benefits .icon { width: 22px; height: 22px; border-radius: 50%; display: grid; place-items: center; font-size: .75rem; font-weight: 700; color: #fff; background: #2f8a6b; }
        .membership-tier-benefits .is-cond .icon { background: #b7791f; }
        .membership-tier-benefits .is-no { color: #8b979f; }
        .membership-tier-benefits .is-no .icon { background: #cfd7dc; }
        .membership-tier-benefits em { font-style: normal; font-size: .85rem; color: #6b7c87; text-align: right; }
        .membership-tier-gallery img { aspect-ratio: 4 / 3; object-fit: cover; }
        .membership-tier-gallery .col-md-6 img { aspect-ratio: auto; height: 100%; }
        .membership-tier-card { display: flex; flex-direction: column; height: 100%; padding: 1rem; border: 1px solid #dfe7ea; color: #1d2b36; text-decoration: none; transition: border-color .3s; }
        .membership-tier-card:hover { border-color: #3F9CAA; color: #1d2b36; }
        .membership-tier-card strong { font-family: 'DM Serif Display', serif; font-weight: 400; font-size: 1.25rem; color: #003F57; }
        @media (max-width: 767px) {
            .membership-tier-fact:nth-child(2) { border-right: 0; }
            .membership-tier-gallery .col-md-6 img { aspect-ratio: 4 / 3; }
        }
    </style>
@endpush
