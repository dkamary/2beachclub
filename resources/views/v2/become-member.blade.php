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

                <div class="row">
                    <div class="col-12">

                        <x-v2.membership />

                    </div>
                </div>

            </main>

            <footer></footer>

        </section>

        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center py-5">
                    @include('home.forms.landing-page-contact')
                </div>
            </div>
        </div>

    </x-layout.v2>
@endsection


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
