{{-- v2/home --}}

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ asset('v2/img/2BC-Sunset-Header.webp') }}" title="Sunset Events">

        <div class="container bg-white my-5">

            <x-widget.section
                :id="$id ?? null"
                :lazyload="true"
                :bg-image="asset('v2/img/2BC-sunset-session-full.webp')"
                :bg-image-mini="asset('v2/img/2BC-sunset-session-mini.webp')"
                :bg-class="['w-100']"
                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-11 col-md-10 mx-auto"
            >

                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="special-heading fs-1 fw-bold text-center pb-2">Sunset Session</h2>
                        <h3 class="special-heading fs-5 fw-semibold text-center pb-3">Every Friday: 17.30 - 20.30</h3>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-12">
                        <p>The 2Beach Club is the ultimate destination for sun, sand, and luxury on the pristine shores of
                            Pereybere. Nestled along the breathtaking coastline, this club offers an unparalleled experience
                            that combines relaxation, entertainment, and natural beauty.</p>

                        <p>With exceptional service, stunning surroundings, and a range of tailored activities, it’s the perfect
                            haven to escape the hustle and bustle of everyday life and immerse yourself in pure bliss.</p>
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-12 d-flex justify-content-evenly align-items-center">
                        <x-widget.book />

                        <div class="btn-container contact-button book-table my-4">
                            <a href="#" class="text-uppercase">
                                Menu
                            </a>
                        </div>
                    </div>

                </div>

            </x-widget.section>

        </div>

    </x-layout.v2>
@endsection
