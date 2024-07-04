{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <x-widget.section
        :id="$id ?? null"
        :lazyload="true"
        :bg-image="asset('v2/img/events/2beach-club-event-cocktails.webp')"
        :bg-image-mini="asset('v2/img/events/2beach-club-event-cocktails-1.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="right"
        text-size="2/3"
    >

        <div class="row">
            <div class="col-12">
                <h2 class="special-heading fw-bold text-left">Events</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p>
                    2Beach Club invites guests to revel in special events and the breathtaking beachfront ambiance all year round.
                </p>
                <p>
                    Whether you're here to witness stunning sunsets, indulge in gourmet cuisine, or immerse yourself in live music,
                    we guarantee a memorable experience for all.
                </p>
                <p>
                    Experience the pinnacle of sophistication and hospitality at 2Beach Club,
                    where your events become unforgettable moments of excellence.
                </p>
                <p>
                    Stay connected with us! Follow us on
                    <a href="{{ config('2beachclub.facebook') }}">Facebook</a>, <a href="{{ config('2beachclub.instagram') }}">Instagram</a>,
                    join our <a href="{{ config('2beachclub.whatsapp-channel') }}">WhatsApp community</a>, or subscribe to our
                    <a href="{{ route('home') }}#newsletter">newsletter</a> to stay informed about our latest events and offers.
                </p>
            </div>

        </div>

    </x-widget.section>

</div>

@push('head')

    <style id="events--styles">
        #events {
            margin-top: 8% !important;
        }

        @media screen and (min-width: 576px) {
            @media screen {
                #events {
                    margin-top: 8% !important;
                }
            }
        }
    </style>

@endpush
