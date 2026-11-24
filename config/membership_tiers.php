<?php

/*
|--------------------------------------------------------------------------
| Membership tiers
|--------------------------------------------------------------------------
|
| Data used by the membership tier pages (/become-member/{tier}).
| Separate from config/membership.php, which feeds the mobile comparison table.
| `value` must match the radio values of the contact form
| (resources/views/home/forms/landing-page-contact.blade.php).
|
| Benefit status: yes | cond (included under condition) | no
|
*/

$benefits = [
    'restaurant' => 'Restaurant',
    'rooftop'    => 'Rooftop bar',
    'pool'       => 'Pool',
    'beach'      => 'Towel service, locker room & beach sunbeds',
    'concierge'  => 'Concierge service',
    'shuttle'    => 'Shuttle between 2Beach Club and 2Futures residences (Bain Boeuf to Trou aux Biches)',
    'guests'     => 'Guest passes',
    'tenants'    => 'Access for tenants (if rented through 2Futures Holidays)',
    'discount'   => 'Discount on food & beverages',
];

return [

    'benefits' => $benefits,

    'tiers' => [

        'platinum-permanent' => [
            'route'    => 'membership_platinum_permanent',
            'view'     => 'v2/membership/platinum-permanent',
            'name'     => 'Platinum',
            'option'   => 'Option 1',
            'label'    => 'Platinum (Option 1)',
            'value'    => 'platinum (option 1)',
            'title'    => 'Platinum Membership',
            'subtitle' => 'Permanent membership',
            'hero'     => 'v2/img/2BC-Sunset-Header.webp',
            'band'     => '#3d4752',
            'gallery'  => [
                'v2/img/2beach-club-beach-pool.webp',
                'v2/img/2beach-club-restaurant-view.webp',
                'v2/img/2beach-club-lifestyle.webp',
            ],
            'facts' => [
                'Duration'     => 'Permanent',
                'Entrance fee' => 'USD 18,000',
                'Annual fee'   => 'USD 400',
                'Members'      => '5',
            ],
            'benefits' => [
                'restaurant' => ['yes'],
                'rooftop'    => ['yes'],
                'pool'       => ['yes'],
                'beach'      => ['yes'],
                'concierge'  => ['yes'],
                'shuttle'    => ['yes'],
                'guests'     => ['yes', '5 per year'],
                'tenants'    => ['yes'],
                'discount'   => ['yes', '15%'],
            ],
        ],

        'platinum-annual' => [
            'route'    => 'membership_platinum_annual',
            'view'     => 'v2/membership/platinum-annual',
            'name'     => 'Platinum',
            'option'   => 'Option 2',
            'label'    => 'Platinum (Option 2)',
            'value'    => 'platinum (option 2)',
            'title'    => 'Platinum Membership',
            'subtitle' => 'Annual membership',
            'hero'     => 'v2/img/2beach-club-areal-view.webp',
            'band'     => '#3d4752',
            'gallery'  => [
                'v2/img/2beach-club-lifestyle.webp',
                'v2/img/2beach-club-beach-pool.webp',
                'v2/img/2beach-club-restaurant-view.webp',
            ],
            'facts' => [
                'Duration'     => 'Annual',
                'Entrance fee' => 'None',
                'Annual fee'   => 'USD 2,000',
                'Members'      => '5',
            ],
            'benefits' => [
                'restaurant' => ['yes'],
                'rooftop'    => ['yes'],
                'pool'       => ['yes'],
                'beach'      => ['yes'],
                'concierge'  => ['yes'],
                'shuttle'    => ['yes'],
                'guests'     => ['yes', '5 per year'],
                'tenants'    => ['yes'],
                'discount'   => ['yes', '15%'],
            ],
        ],

        'gold' => [
            'route'    => 'membership_gold',
            'view'     => 'v2/membership/gold',
            'name'     => 'Gold',
            'option'   => null,
            'label'    => 'Gold',
            'value'    => 'gold',
            'title'    => 'Gold Membership',
            'subtitle' => 'Annual membership',
            'hero'     => 'v2/img/2beach-club-beach-pool.webp',
            'band'     => '#8a6a1f',
            'gallery'  => [
                'v2/img/2beach-club-restaurant-view.webp',
                'v2/img/2beach-club-lifestyle.webp',
                'v2/img/2beach-club-areal-view.webp',
            ],
            'facts' => [
                'Duration'     => 'Annual',
                'Entrance fee' => 'None',
                'Annual fee'   => 'USD 1,000',
                'Members'      => '5',
            ],
            'benefits' => [
                'restaurant' => ['yes'],
                'rooftop'    => ['yes'],
                'pool'       => ['yes'],
                'beach'      => ['yes'],
                'concierge'  => ['yes'],
                'shuttle'    => ['no'],
                'guests'     => ['yes', '5 per year'],
                'tenants'    => ['no'],
                'discount'   => ['yes', '10%'],
            ],
        ],

        'silver' => [
            'route'    => 'membership_silver',
            'view'     => 'v2/membership/silver',
            'name'     => 'Silver',
            'option'   => null,
            'label'    => 'Silver',
            'value'    => 'silver',
            'title'    => 'Silver Membership',
            'subtitle' => 'Annual membership',
            'hero'     => 'v2/img/2beach-club-restaurant-view.webp',
            'band'     => '#5f707c',
            'gallery'  => [
                'v2/img/2beach-club-beach-pool.webp',
                'v2/img/2BC-Sunset-Header.webp',
                'v2/img/2beach-club-lifestyle.webp',
            ],
            'facts' => [
                'Duration'     => 'Annual',
                'Entrance fee' => 'None',
                'Annual fee'   => 'USD 400',
                'Members'      => '4',
            ],
            'benefits' => [
                'restaurant' => ['yes'],
                'rooftop'    => ['yes'],
                'pool'       => ['yes'],
                'beach'      => ['cond', 'Min. spend USD 25 / person'],
                'concierge'  => ['cond', 'Extra charge'],
                'shuttle'    => ['no'],
                'guests'     => ['yes', '2 per year'],
                'tenants'    => ['no'],
                'discount'   => ['yes', '5%'],
            ],
        ],

        'holiday-tenants' => [
            'route'    => 'membership_holiday_tenants',
            'view'     => 'v2/membership/holiday-tenants',
            'name'     => '2Futures Holidays Tenants',
            'option'   => null,
            'label'    => 'Tenants',
            'value'    => "2future's holiday tenants",
            'title'    => '2Futures Holidays Tenants',
            'subtitle' => 'Included with your stay',
            'hero'     => 'v2/img/2beach-club-lifestyle.webp',
            'band'     => '#2f7f8a',
            'gallery'  => [
                'v2/img/2beach-club-areal-view.webp',
                'v2/img/2beach-club-beach-pool.webp',
                'v2/img/2beach-club-restaurant-view.webp',
            ],
            'facts' => [
                'Duration'     => 'Your stay',
                'Entrance fee' => 'None',
                'Annual fee'   => 'None',
                'Access'       => 'Tenants',
            ],
            'benefits' => [
                'restaurant' => ['yes'],
                'rooftop'    => ['yes'],
                'pool'       => ['yes'],
                'beach'      => ['cond', 'Min. spend USD 35 / person'],
                'concierge'  => ['cond', 'Extra charge'],
                'shuttle'    => ['yes'],
                'guests'     => ['no'],
                'discount'   => ['no'],
            ],
        ],

    ],
];
