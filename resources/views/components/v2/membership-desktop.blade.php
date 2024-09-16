{{-- Membership Desktop --}}

<table {{ $attributes->merge(['class' => 'membership-table']) }}>

    <thead>
        <tr>
            <th colspan="6" class="text-center bg-blue-1 text-white py-3">
                <h3>Membership tier</h3>
            </th>
        </tr>

        <tr>
            <th width="25%" class="bg-blue-2 text-white text-center py-1">&nbsp;</th>
            <th width="15%" class="bg-blue-2 text-white text-center py-1">Platinum<br>(Option 1)</th>
            <th width="15%" class="bg-blue-2 text-white text-center py-1">Platinum<br>(Option 2)</th>
            <th width="15%" class="bg-blue-2 text-white text-center py-1">Gold</th>
            <th width="15%" class="bg-blue-2 text-white text-center py-1">Silver</th>
            <th width="15%" class="bg-blue-2 text-white text-center py-1">2Futures<br>Holiday's<br>tenants</th>
        </tr>
    </thead>

    <tbody>

        <tr>
            <th>Duration of<br>membership</th>
            <td>Permanent</td>
            <td>Annual</td>
            <td>Annual</td>
            <td>Annual</td>
            <td></td>
        </tr>
        <tr>
            <th>Entrance Fee (USD)</th>
            <td>18 000</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr>
            <th>Annual Fee (USD)</th>
            <td>400</td>
            <td>2 000</td>
            <td>1 000</td>
            <td>400</td>
            <td>-</td>
        </tr>
        <tr>
            <th>Number of<br>members</th>
            <td>5</td>
            <td>5</td>
            <td>5</td>
            <td>4</td>
            <td>-</td>
        </tr>
        <tr class="background-blue">
            <td colspan="6" class="bg-blue-1">&nbsp</td>
        </tr>
        <tr>
            <th><strong>Benefits</strong></th>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
            <th>Restaurant</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
        </tr>
        <tr>
            <th>Rooftop bar</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
        </tr>
        <tr>
            <th>Pool</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
        </tr>
        <tr>
            <th>
                Towel service<br>
                Locker room<br>
                Beach sunbeds<br>
            </th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>
                Subject to
                minimum
                consumption
                of USD 25
                per person
            </td>
            <td>
                Subject to
                minimum
                consumption
                of USD 35
                per person
            </td>
        </tr>
        <tr>
            <th>Concierge service</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Extra charge</td>
            <td>Extra charge</td>
        </tr>
        <tr>
            <th>
                Shuttle service:
                between 2Beach
                Club and 2Futures’
                residences
                (Bain Boeuf to
                Trou aux Biches)
            </th>
            <td>Yes</td>
            <td>Yes</td>
            <td>No</td>
            <td>No</td>
            <td>Yes</td>
        </tr>
        <tr>
            <th>Guest passes</th>
            <td>5</td>
            <td>5</td>
            <td>5</td>
            <td>2</td>
            <td>No</td>
        </tr>
        <tr>
            <th>
                Access to tenants
                (if rented through
                2Futures Holidays)
            </th>
            <td>Yes</td>
            <td>Yes</td>
            <td>No</td>
            <td>No</td>
            <td>N/A</td>
        </tr>
        <tr>
            <th>
                Discount on food <br>
                and beverages
            </th>
            <td>15%</td>
            <td>15%</td>
            <td>10%</td>
            <td>5%</td>
            <td>No</td>
        </tr>
        {{-- <tr class="background-blue">
            <td colspan="6" class="bg-blue-1">&nbsp</td>
        </tr>
        <tr>
            <th><strong>Opening 2024</strong></th>
            <td colspan="5"></td>
        </tr>
        <tr>
            <th>Boardroom</th>
            <td>4hrs monthly</td>
            <td>4hrs monthly</td>
            <td>2hrs monthly</td>
            <td>Exra charge</td>
            <td>No</td>
        </tr> --}}
    </tbody>

</table>

<div class="row mt-3 mb-5">
    <div class="col-12">
        <em>*Day membership packages will be on offer, depending on availability
            and at the discretion of the management.</em>
    </div>
</div>

@once

    @push('head')
        <style id="membership--styles">
            .bg-blue-1 {
                background-color: #1a3b55;
            }

            .bg-blue-2 {
                background-color: #51a9a2;
            }

            .membership-table,
            .membership-table tr,
            .membership-table th,
            .membership-table td {
                border-collapse: collapse;
                border: solid thin #2a3e92;
                color: #231f20;
            }

            .membership-table th,
            .membership-table td {
                padding: .3rem .5rem;
            }
        </style>
    @endpush

@endonce
