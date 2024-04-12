{{-- introduction --}}

@php
    $class = $class ?? [];
@endphp

<div @class($class)>

    <div class="row mb-3">
        <div class="col-12">
            <h2 class="text-center special-heading pt-5 pb-4">The 2Beach Club is more than just a destination; it’s a lifestyle.</h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-md-12 col-lg-6">
            <img class="img-fluid lazy-load-image" src="https://fakeimg.pl/90x90/" data-src="https://fakeimg.pl/900x900/" alt="">
        </div>
        <div class="col-12 col-md-8 col-lg-6 d-flex offset-0 offset-md-2 offset-lg-0 pt-md-5 pt-lg-0 flex-column align-items-center justify-content-center">
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
