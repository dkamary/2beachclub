{{-- v2/home --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ asset('v2/img/2beach-club-beach-pool.webp') }}">

        <section class="container">

            <header class="row mb-5">
                <div class="col-12">
                    <h2 class="special-heading text-center mt-5" id="membership-title">Thank you for expressing your interest in 2Beach Club. We hope you have a marvellous experience!</h2>
                </div>

                {{-- <p class="col-12 mt-5">
                    See you soon.
                </p> --}}
            </header>

        </section>


        <x-v2.upcoming-events id="upcoming-events" :class="['container', 'bg-white', 'my-5']" />
        <x-v2.gallery id="gallery" :class="['container', 'bg-white', 'my-5']" />

    </x-layout.v2>
@endsection


@push('foot')
    <script id="membership--scripts">
        window.addEventListener("DOMContentLoaded", function(){
            const target = document.querySelector("#membership-title");
            if (!target) {
                console.warn("Unable to select the membership target");
                return;
            }

            if (target) setTimeout(() => {
                target.scrollIntoView({ behavior: 'smooth' });
            }, 1000);
        });
    </script>
@endpush
