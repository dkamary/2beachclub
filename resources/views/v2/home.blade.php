{{-- v2/home --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true">

        <x-slot name="content">
            <div class="position-absolute" style="left: 50%; bottom: 2%; transform: translateX(-50%);">
                <h1 style="color: #FFF; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);">Celebrate life everyday</h1>
            </div>
        </x-slot>

        <div class="container bg-white py-5">

            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="text-center">The 2Beach Club is more than just a destination; it’s a lifestyle.</h2>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <img class="img-fluid h-100" src="https://fakeimg.pl/900x900/" alt="">
                </div>
                <div class="col-12 col-sm-6 d-flex flex-column align-items-center justify-content-center">
                    <p>
                        The 2Beach Club is the ultimate destination for sun, sand, and luxury on the pristine shores of Pereybere.
                        Nestled along the breathtaking coastline, this club offers an unparalleled experience that combines relaxation, entertainment, <span class="text-nowrap">and natural beauty.</span>
                    </p>
                    <p>
                        With exceptional service, stunning surroundings, and a range of tailored activities,
                        it’s the perfect haven to escape the hustle and bustle of everyday life and immerse yourself <span class="text-nowrap">in pure bliss.</span>
                    </p>
                    <p>
                        At the 2Beach Club, members can savour exquisite dining, lounge by the pool with beach access,
                        enjoy attentive concierge service, witness stunning sunsets from the rooftop, and dine barefoot in the <span class="text-nowrap">sandy bar area.</span>
                    </p>
                </div>
            </div>
        </div>
    </x-layout.v2>
@endsection

