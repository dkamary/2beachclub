{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <x-widget.section
        :id="$id ?? null"
        :lazyload="true"
        :bg-image="asset('v2/img/contact/contact us.webp')"
        :bg-image-mini="asset('v2/img/contact/contact us-1.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="center"
        text-size="1/2"
    >

        <div class="row">
            <div class="col-12">
                <h2 class="special-heading fw-bold text-center mb-3">Contact us</h2>
            </div>
        </div>

        <div class="row">

            <div class="col-12 text-center">
                <p>
                    Tel: (+230) 262 19 55
                </p>
                <p>
                    Impasse, Pointe D'azur, Pereybere, Mauritius.
                </p>
            </div>

            <div class="col-12 my-3 d-flex justify-content-center align-items-center">

                <div class="sn-icon mx-2">
                    <a href="{{ config('2beachclub.whatsapp') }}" target="_blank">
                        <img src="{{ asset('v2/svg/whatsapp.svg') }}" alt="whatsapp" height="42" width="42">
                    </a>
                </div>

                <div class="sn-icon mx-2">
                    <a href="{{ config('2beachclub.facebook') }}" target="_blank">
                        <img src="{{ asset('v2/svg/facebook.svg') }}" alt="facebook" height="32" width="32">
                    </a>
                </div>

                <div class="sn-icon mx-2">
                    <a href="{{ config('2beachclub.instagram') }}" target="_blank">
                        <img src="{{ asset('v2/svg/instagram.svg') }}" alt="instagram" height="32" width="32">
                    </a>
                </div>

            </div>

        </div>

        <x-widget.newsletter class="my-3" />

    </x-widget.section>

</div>

@once

    @push('head')

        <style id="contact-us--styles">
            #contact-us {
                margin-bottom: 10%;
                margin-top: 30%;
            }

            #contact-us .special-heading {
                font-size: 32px;
            }

            .sn-icon,
            .sn-icon a {
                text-align: center;
            }

            @media screen and (min-width: 576px) {
                #contact-us {
                    margin-bottom: 6%;
                    margin-top: unset;
                }

                #conctact-us .special-heading {
                    font-size: 32px;
                }
            }
        </style>

    @endpush

@endonce
