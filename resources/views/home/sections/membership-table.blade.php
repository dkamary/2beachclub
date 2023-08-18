{{-- Membership table --}}

<table class="membership-table">
    <thead>
        {{-- <tr>
            <th style="padding-top: 12px; padding-bottom: 12px;">
                &nbsp;
            </th>
            <th colspan="3" style="padding-top: 12px; padding-bottom: 12px;">
                <h3>Membership tier</h3>
            </th>
        </tr> --}}
        <tr>
            <th width="20%" class="thead">
                <h3 class="text-left">Description</h3>
            </th>
            <th width="20%" class="membership platinum-nope">
                {{-- <h5>platinum</h5> --}}
                <img src="{{ asset('img/membership-card-platinum.webp') }}" alt="platinum" />
            </th>
            <th width="20%" class="membership gold-nope">
                {{-- <h5>Gold</h5> --}}
                <img src="{{ asset('img/membership-card-gold.webp') }}" alt="gold" />
            </th>
            <th width="20%" class="membership silver-nope">
                {{-- <h5>Silver</h5> --}}
                <img src="{{ asset('img/membership-card-silver.webp') }}" alt="silver" />
            </th>
            {{-- <th width="20%" class="membership day-full">Day<br>(full access)</th>
            <th width="20%" class="membership day-resto">Day<br>(restaurant)</th> --}}
            {{-- <th width="20%" class="membership tenants">Tenants<br>(2Futures Holidays)</th> --}}
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td class="thead">Annual Fee (USD)</td>
            <td class="membership platinum">1500</td>
            <td class="membership gold">1000</td>
            <td class="membership silver">500</td>
            {{-- <td class="membership day-full"></td>
            <td class="membership day-resto"></td> --}}
            {{-- <td class="membership tenants"></td> --}}
        </tr>
        {{-- <tr>
            <td class="thead">Annual Fee for Ki Residences owners (80% discount)</td>
            <td class="membership platinum">300</td>
            <td class="membership gold"></td>
            <td class="membership silver"></td>
            <td class="membership day-full"></td>
            <td class="membership day-resto"></td>
            <td class="membership tenants"></td>
        </tr> --}}
        {{-- <tr>
            <td class="thead">Day package fee per person (USD)</td>
            <td class="membership platinum"></td>
            <td class="membership gold"></td>
            <td class="membership silver"></td>
            <td class="membership day-full">50</td>
            <td class="membership day-resto">15</td>
            <td class="membership tenants"></td>
        </tr> --}}
        <tr>
            <td class="thead">Number of members</td>
            <td class="membership platinum">5</td>
            <td class="membership gold">5</td>
            <td class="membership silver">4</td>
            {{-- <td class="membership day-full">1</td>
            <td class="membership day-resto">1</td> --}}
            {{-- <td class="membership tenants"></td> --}}
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td class="thead" style="padding-top: 12px">
                <h3>Benefits</h3>
            </td>
            <td colspan="3" style="background-color: #ffffff;">&nbsp;</td>
            {{-- <td class="membership platinum"></td>
            <td class="membership gold"></td>
            <td class="membership silver"></td> --}}
            {{-- <td class="membership day-full"></td>
            <td class="membership day-resto"></td> --}}
            {{-- <td class="membership tenants"></td> --}}
        </tr>
        <tr>
            <td class="thead">Restaurant</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            <td class="membership silver">✔</td>
            {{-- <td class="membership day-full">✔</td>
            <td class="membership day-resto">✔</td>
            <td class="membership tenants">✔</td> --}}
        </tr>
        {{-- <tr>
            <td class="thead">Lounge<br>(opening 2024)</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            <td class="membership silver">✔</td>
            <td class="membership day-full"><strong>-</strong></td>
            <td class="membership day-resto"><strong>-</strong></td>
            <td class="membership tenants"><strong>-</strong></td>
        </tr>
        <tr>
            <td class="thead">Access to boardroom<br>(opening 2024)</td>
            <td class="membership platinum">4 hours monthly</td>
            <td class="membership gold">2 hours monthly</td>
            <td class="membership silver">Extra charge</td>
            <td class="membership day-full"><strong>-</strong></td>
            <td class="membership day-resto"><strong>-</strong></td>
            <td class="membership tenants"><strong>-</strong></td>
        </tr> --}}
        <tr>
            <td class="thead">Rooftop bar</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            <td class="membership silver">✔</td>
            {{-- <td class="membership day-full">✔</td>
            <td class="membership day-resto">✔</td>
            <td class="membership tenants">✔</td> --}}
        </tr>
        <tr>
            <td class="thead">Pool</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            <td class="membership silver">✔</td>
            {{-- <td class="membership day-full">✔</td>
            <td class="membership day-resto"><strong>-</strong></td>
            <td class="membership tenants">✔</td> --}}
        </tr>
        <tr>
            <td class="thead">Towel service</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            <td class="membership silver" rowspan="3">Subject to minimum consumption of <br>USD 25 per person</td>
            {{-- <td class="membership day-full">✔</td>
            <td class="membership day-resto"><strong>-</strong></td>
            <td class="membership tenants" rowspan="3">Subject to minimum consumption of <br>USD 35 per person</td>--}}
        </tr>
        <tr>
            <td class="thead">Locker room</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            {{-- <td></td> --}}
            {{-- <td class="membership day-full">✔</td>
            <td class="membership day-resto"><strong>-</strong></td>
            {{-- <td></td> --}}
        </tr>
        <tr>
            <td class="thead">Beach transat</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            {{-- <td></td> --}}
            {{-- <td class="membership day-full">✔</td>
            <td class="membership day-resto"><strong>-</strong></td>
            {{-- <td></td> --}}
        </tr>
        <tr>
            <td class="thead">Concierge service</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold">✔</td>
            <td class="membership silver">Extra charge</td>
            {{-- <td class="membership day-full">Extra charge</td>
            <td class="membership day-resto">Extra charge</td>
            <td class="membership tenants">Extra charge</td> --}}
        </tr>
        <tr>
            <td class="thead">Shuttle: between 2Beach Club and 2Futures' residences (Bain Boeuf - Trou aux Biches)</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold"><strong>-</strong></td>
            <td class="membership silver"><strong>-</strong></td>
            {{-- <td class="membership day-full"><strong>-</strong></td>
            <td class="membership day-resto"><strong>-</strong></td>
            <td class="membership tenants">✔</td> --}}
        </tr>
        <tr>
            <td class="thead">Guest passes</td>
            <td class="membership platinum">5</td>
            <td class="membership gold">5</td>
            <td class="membership silver">2</td>
            {{-- <td class="membership day-full"><strong>-</strong></td>
            <td class="membership day-resto"><strong>-</strong></td>
            <td class="membership tenants"><strong>-</strong></td> --}}
        </tr>
        <tr>
            <td class="thead">Access to tenants <br>(if rented through 2Futures Holidays)</td>
            <td class="membership platinum">✔</td>
            <td class="membership gold"><strong>-</strong></td>
            <td class="membership silver"><strong>-</strong></td>
            {{-- <td class="membership day-full"><strong>-</strong></td>
            <td class="membership day-resto"><strong>-</strong></td>
            <td class="membership tenants">N/A</td> --}}
        </tr>
        <tr>
            <td class="thead">Discount on F&B</td>
            <td class="membership platinum">15%</td>
            <td class="membership gold">10%</td>
            <td class="membership silver">5%</td>
            {{-- <td class="membership day-full">0%</td>
            <td class="membership day-resto">0%</td>
            <td class="membership tenants">0%</td> --}}
        </tr>
    </tbody>
</table>

@once
    @push('head')
        <style>
            .text-left {
                text-align: left !important;
            }

            .membership-table {
                width: 95%;
                font-size: 0.9em;
                margin-left: auto;
                margin-right: auto;
            }

            .membership-table th {
                vertical-align: middle;
                text-align: center;
                background-color: #ffffff;
            }

            .membership-table td {
                text-align: center;
            }

            .membership-table th,
            .membership-table td {
                padding-top: 6px;
                padding-bottom: 6px;
                padding-left: 3px;
                padding-right: 3px;
            }

            .membership-table th img {
                width: auto;
                height: 7rem;
                /* max-width: 150px; */
                margin-top: 10px;
            }

            .membership-table .thead {
                text-align: left;
                background-color: #ffffff;
                color: #333333;
                padding-left: 8px;
            }

            .membership {
                color: #ececec;
            }

            .membership.platinum {
                background-color: rgb(0, 54, 95);
            }

            .membership.gold {
                background-color: rgb(80, 163, 178);
            }

            .membership.silver {
                background-color: rgb(188, 188, 188);
                color: #333333;
            }

            .membership.day-full {
                background-color: #ff1ead;
            }

            .membership.day-resto {
                background-color: #005710;
            }

            .membership.tenants {
                background-color: rgb(255, 255, 255);
                color: #333333;
            }

            @media screen and (max-width: 576px) {
                .membership-table {
                    width: 70%;
                }
            }
        </style>
    @endpush
@endonce
