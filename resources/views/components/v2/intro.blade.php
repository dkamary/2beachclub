{{-- introduction --}}

@php
    $class = $class ?? [];
@endphp

<div @class($class)>

    <x-widget.section
        :id="$id ?? null"
        :lazyload="true"
        :bg-image="asset('v2/img/2bc-intro.webp')"
        :bg-image-mini="asset('v2/img/2bc-intro-mini.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
    >
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="special-heading pb-3">The 2Beach Club is more than just a destination; <br> it's a lifestyle.</h2>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-12 p-3">
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
    </x-widget.section>

</div>
