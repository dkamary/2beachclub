{{-- Membership Comparison
     New presentation of the membership table (same content as x-v2.membership-desktop,
     minus the Concierge service row, no longer offered).
     Values: 'yes' | 'no' | '-' | 'N/A' | any text (conditions, numbers, amounts).
--}}

@php
    $tierConfig = config('membership_tiers.tiers', []);

    $columns = [
        ['label' => 'Platinum', 'sub' => 'Option 1', 'tier' => 'platinum-permanent'],
        ['label' => 'Platinum', 'sub' => 'Option 2', 'tier' => 'platinum-annual'],
        ['label' => 'Gold', 'sub' => null, 'tier' => 'gold'],
        ['label' => 'Silver', 'sub' => null, 'tier' => 'silver'],
        ['label' => "2Futures Holiday's tenants", 'sub' => null, 'tier' => 'holiday-tenants'],
    ];

    $groups = [
        'Membership' => [
            ['Duration of membership', ['Permanent', 'Annual', 'Annual', 'Annual', '']],
            ['Entrance Fee (USD)', ['18 000', '-', '-', '-', '-']],
            ['Annual Fee (USD)', ['400', '2 000', '1 000', '400', '-']],
            ['Number of members', ['5', '5', '5', '4', '-']],
        ],
        'Benefits' => [
            ['Restaurant', ['yes', 'yes', 'yes', 'yes', 'yes']],
            ['Rooftop bar', ['yes', 'yes', 'yes', 'yes', 'yes']],
            ['Pool', ['yes', 'yes', 'yes', 'yes', 'yes']],
            ['Towel service<br>Locker room<br>Beach sunbeds', ['yes', 'yes', 'yes', 'Subject to minimum consumption of USD 25 per person', 'Subject to minimum consumption of USD 35 per person']],
            ['Shuttle service: between 2Beach Club and 2Futures’ residences, from Bain Boeuf to Trou aux Biches only', ['yes', 'yes', 'no', 'no', 'yes']],
            ['Guest passes', ['5', '5', '5', '2', 'no']],
            ['Access to tenants (if rented through 2Futures Holidays)', ['yes', 'yes', 'no', 'no', 'N/A']],
            ['Discount on food and beverages', ['15%', '15%', '10%', '5%', 'no']],
        ],
    ];
@endphp

<div {{ $attributes->merge(['class' => 'mcomp']) }} id="membership-details">

    <h2 class="special-heading fs-2 mb-4">Compare memberships</h2>

    <div class="mcomp__scroll" tabindex="0" role="region" aria-label="Membership comparison table">
        <table class="mcomp__table">
            <caption class="visually-hidden">Membership tiers compared: fees, members and benefits</caption>

            <thead>
                <tr>
                    <td class="mcomp__corner"></td>
                    @foreach ($columns as $column)
                        @php
                            $tier = $tierConfig[$column['tier']] ?? [];
                            $enabled = $tier['enabled'] ?? false;
                        @endphp
                        <th scope="col" @class(['mcomp__head', 'is-muted' => !$enabled])
                            style="--band: {{ $tier['band'] ?? '#3F9CAA' }};">
                            <span class="mcomp__name">{{ $column['label'] }}</span>
                            @if ($column['sub'])
                                <span class="mcomp__sub">{{ $column['sub'] }}</span>
                            @endif
                            @if ($enabled)
                                <a href="{{ route($tier['route']) }}" class="mcomp__link">View details</a>
                            @else
                                <span class="mcomp__note">Included with Platinum</span>
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>

            @foreach ($groups as $group => $rows)
                <tbody>
                    <tr class="mcomp__group">
                        <th scope="colgroup" colspan="{{ count($columns) + 1 }}">{{ $group }}</th>
                    </tr>
                    @foreach ($rows as [$label, $values])
                        <tr>
                            <th scope="row" class="mcomp__label">{!! $label !!}</th>
                            @foreach ($values as $i => $value)
                                <td @class(['mcomp__cell', 'is-muted' => !($tierConfig[$columns[$i]['tier']]['enabled'] ?? false)])>
                                    @if ($value === 'yes')
                                        <span class="mcomp__icon is-yes" aria-hidden="true">&#10003;</span><span class="visually-hidden">Yes</span>
                                    @elseif ($value === 'no')
                                        <span class="mcomp__icon is-no" aria-hidden="true">&#10005;</span><span class="visually-hidden">No</span>
                                    @elseif ($value === '-' || $value === '')
                                        <span class="mcomp__empty" aria-hidden="true">&mdash;</span><span class="visually-hidden">Not applicable</span>
                                    @elseif ($value === 'N/A')
                                        <span class="mcomp__empty">N/A</span>
                                    @elseif (strlen($value) > 12)
                                        <span class="mcomp__condition">{{ $value }}</span>
                                    @else
                                        <span class="mcomp__value">{{ $value }}</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>

    <p class="mcomp__footnote"><em>*Day membership packages will be on offer, depending on availability and at the discretion of the management.</em></p>

</div>

@once
    @push('head')
        <style id="membership-comparison-styles">
            .mcomp { margin: 3rem 0; }

            .mcomp__scroll {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            /* Outer borders on the cells (not the wrapper) so the empty top-left corner stays borderless */
            .mcomp__label,
            .mcomp__group th { border-left: 1px solid #e1e8eb; }
            .mcomp__table tr > :last-child { border-right: 1px solid #e1e8eb; }
            .mcomp__table tbody:last-of-type tr:last-child > * { border-bottom-color: #e1e8eb; }
            .mcomp__corner { border-bottom: 0 !important; }

            .mcomp__scroll:focus-visible { outline: 3px solid #3F9CAA; outline-offset: 2px; }

            .mcomp__table {
                width: 100%;
                min-width: 820px;
                border-collapse: separate;
                border-spacing: 0;
                color: #1d2b36;
                font-size: .95rem;
            }

            .mcomp__table th,
            .mcomp__table td {
                padding: .85rem 1rem;
                border-bottom: 1px solid #e9eff1;
                vertical-align: middle;
            }

            /* Sticky first column so labels stay visible while scrolling on mobile */
            .mcomp__corner,
            .mcomp__label {
                position: sticky;
                left: 0;
                z-index: 2;
                background: #fff;
                width: 26%;
                box-shadow: 1px 0 0 #e1e8eb;
            }

            .mcomp__label {
                font-weight: 600;
                text-align: left;
                line-height: 1.35;
            }

            .mcomp__head {
                text-align: center;
                background: #fff;
                border-top: 6px solid var(--band);
                padding-top: 1.1rem !important;
                padding-bottom: 1.1rem !important;
                width: 14.8%;
            }

            .mcomp__name {
                display: block;
                font-family: 'DM Serif Display', serif;
                font-weight: 400;
                font-size: 1.3rem;
                line-height: 1.15;
                color: #003F57;
                text-wrap: balance;
            }

            .mcomp__sub {
                display: block;
                font-size: .8rem;
                letter-spacing: .08em;
                text-transform: uppercase;
                color: #5d6f7b;
                margin-top: .2rem;
            }

            .mcomp__link,
            .mcomp__note {
                display: inline-block;
                margin-top: .6rem;
                font-size: .78rem;
            }

            .mcomp__link {
                padding: .25rem .8rem;
                border-radius: 1.5rem;
                background: #3f9caa;
                color: #fff;
                text-decoration: none;
                text-transform: uppercase;
                letter-spacing: .05em;
                transition: background-color .3s;
            }

            .mcomp__link:hover,
            .mcomp__link:focus-visible { background: #2f7f8a; color: #fff; }

            .mcomp__note { color: #5d6f7b; font-style: italic; }

            .mcomp__group th {
                background: #1a3b55;
                color: #fff;
                font-family: 'DM Serif Display', serif;
                font-weight: 400;
                font-size: 1.1rem;
                letter-spacing: .02em;
                padding-top: .6rem;
                padding-bottom: .6rem;
                position: sticky;
                left: 0;
            }

            .mcomp__cell { text-align: center; }

            .mcomp__table tbody tr:not(.mcomp__group):hover .mcomp__cell,
            .mcomp__table tbody tr:not(.mcomp__group):hover .mcomp__label { background: #f3f8f8; }

            .mcomp__cell.is-muted,
            .mcomp__head.is-muted { background: #fafbfb; }

            .mcomp__icon {
                display: inline-grid;
                place-items: center;
                width: 26px;
                height: 26px;
                border-radius: 50%;
                font-size: .8rem;
                font-weight: 700;
            }

            .mcomp__icon.is-yes { background: #2f8a6b; color: #fff; }
            .mcomp__icon.is-no { background: #eef1f3; color: #8b979f; }

            .mcomp__empty { color: #8b979f; }

            .mcomp__value {
                font-family: 'DM Serif Display', serif;
                font-size: 1.2rem;
                font-variant-numeric: tabular-nums;
                white-space: nowrap;
            }

            .mcomp__condition {
                display: inline-block;
                font-size: .8rem;
                line-height: 1.35;
                color: #7a5212;
                background: #fdf4e3;
                padding: .3rem .5rem;
                border-radius: 4px;
            }

            .mcomp__footnote { margin-top: 1rem; font-size: .9rem; }

            @media (max-width: 767px) {
                .mcomp__table { font-size: .85rem; }
                .mcomp__table th,
                .mcomp__table td { padding: .7rem .6rem; }
                .mcomp__corner,
                .mcomp__label { width: 150px; min-width: 150px; }
            }
        </style>
    @endpush
@endonce
