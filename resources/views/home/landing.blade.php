{{-- Index page --}}

@extends('_layouts.base')

@section('header')
    @include('home._partials.header2')
@endsection

@section('main')
    <section class="section landingpage-section-1">
        <header>
            <h1>Welcome to 2Beach Club - A Beachside Haven!</h1>
        </header>
        <main>
            <p>
                Thank you for expressing your interest in 2Beach Club, where every moment is a treasure to behold.
                As you step into a world of coastal luxury and indulgence, we are delighted to offer you the
                opportunity to become a part of our esteemed membership community.
            </p>
            <h2>Membership Categories:</h2>
            <p>Discover three enticing categories of membership, tailored to suit your desires and elevate your beach club experience:</p>
            <ol>
                <li><strong>Silver Membership</strong>: For those seeking occasional beachside leisure and access to our basic amenities.</li>
                <li><strong>Gold Membership</strong>: Designed to provide a more comprehensive beach club experience, complete with exclusive perks and privileges.</li>
                <li><strong>Platinum Membership</strong>: Our most prestigious offering, granting you full access to all facilities and an array of personalized benefits for an extraordinary coastal lifestyle.</li>
            </ol>
            <div class="membership-table-container">
                @include('home.sections.membership-table')
            </div>
            <div class="contact-form-update">
                @include('home.forms.landing-page-contact')
            </div>
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
        </style>
    @endpush
@endonce
