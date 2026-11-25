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
| Tiers with 'enabled' => false are hidden and their URL redirects.
|
*/

$benefits = [
    'restaurant' => 'Restaurant',
    'rooftop'    => 'Rooftop bar',
    'pool'       => 'Pool',
    'beach'      => 'Towel service, locker room & beach sunbeds',
    'shuttle'    => 'Shuttle between 2Beach Club and 2Futures residences, from Bain Boeuf to Trou aux Biches only',
    'guests'     => 'Guest passes',
    'tenants'    => 'Access for tenants (if rented through 2Futures Holidays)',
    'discount'   => 'Discount on food & beverages',
];

return [

    'benefits' => $benefits,

    /*
    | Rights of the tenants of a Platinum member (property rented through
    | 2Futures Holidays). Source: "2Futures Holiday's tenants" column of the
    | membership table.
    */
    'tenant_benefits' => [
        'restaurant' => ['yes'],
        'rooftop'    => ['yes'],
        'pool'       => ['yes'],
        'beach'      => ['cond', 'Min. spend USD 35 / person'],
        'shuttle'    => ['yes'],
        'guests'     => ['no'],
        'discount'   => ['no'],
    ],

    'tiers' => [

        'platinum-permanent' => [
            'enabled'  => true,
            'route'    => 'membership_platinum_permanent',
            'view'     => 'v2/membership/platinum-permanent',
            'name'     => 'Platinum',
            'option'   => 'Option 1',
            'label'    => 'Platinum (Option 1)',
            'value'    => 'platinum (option 1)',
            'title'    => 'Platinum Membership',
            'subtitle' => 'Permanent membership',
            'hero'     => 'v2/img/membership/2beach-club-platinum-permanent-hero.webp',
            'band'     => '#3d4752',
            'gallery'  => [
                ['src' => 'v2/img/membership/2beach-club-platinum-permanent-gallery-1.webp', 'alt' => 'Aerial view of the 2Beach Club beach club and pool'],
                ['src' => 'v2/img/membership/2beach-club-platinum-permanent-gallery-2.webp', 'alt' => 'Overhead view of the white sand beach at 2Beach Club'],
                ['src' => 'v2/img/membership/2beach-club-platinum-permanent-gallery-3.webp', 'alt' => 'Aerial view of 2Beach Club at sunset'],
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
                'shuttle'    => ['yes'],
                'guests'     => ['yes', '5 per year'],
                'tenants'    => ['yes'],
                'discount'   => ['yes', '15%'],
            ],
        ],

        'platinum-annual' => [
            'enabled'  => true,
            'route'    => 'membership_platinum_annual',
            'view'     => 'v2/membership/platinum-annual',
            'name'     => 'Platinum',
            'option'   => 'Option 2',
            'label'    => 'Platinum (Option 2)',
            'value'    => 'platinum (option 2)',
            'title'    => 'Platinum Membership',
            'subtitle' => 'Annual membership',
            'hero'     => 'v2/img/membership/2beach-club-platinum-annual-hero-updated.webp',
            'band'     => '#3d4752',
            'gallery'  => [
                ['src' => 'v2/img/membership/2beach-club-platinum-annual-gallery-1.webp', 'alt' => 'Beach lounge at 2Beach Club at sunset'],
                ['src' => 'v2/img/membership/2beach-club-platinum-annual-gallery-2.webp', 'alt' => 'Pool and tree at 2Beach Club at sunset'],
                ['src' => 'v2/img/membership/2beach-club-platinum-annual-gallery-3.webp', 'alt' => 'Cocktails at the 2Beach Club restaurant at sunset'],
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
                'shuttle'    => ['yes'],
                'guests'     => ['yes', '5 per year'],
                'tenants'    => ['yes'],
                'discount'   => ['yes', '15%'],
            ],
        ],

        'gold' => [
            'enabled'  => true,
            'route'    => 'membership_gold',
            'view'     => 'v2/membership/gold',
            'name'     => 'Gold',
            'option'   => null,
            'label'    => 'Gold',
            'value'    => 'gold',
            'title'    => 'Gold Membership',
            'subtitle' => 'Annual membership',
            'hero'     => 'v2/img/membership/2beach-club-gold-hero.webp',
            'band'     => '#8a6a1f',
            'gallery'  => [
                ['src' => 'v2/img/membership/2beach-club-gold-gallery-1.webp', 'alt' => '2Beach Club beach bar at golden hour'],
                ['src' => 'v2/img/membership/2beach-club-gold-gallery-2.webp', 'alt' => 'Infinity pool at 2Beach Club at sunset'],
                ['src' => 'v2/img/membership/2beach-club-gold-gallery-3.webp', 'alt' => '2Beach Club lounge bar at sunset'],
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
                'shuttle'    => ['no'],
                'guests'     => ['yes', '5 per year'],
                'tenants'    => ['no'],
                'discount'   => ['yes', '10%'],
            ],
        ],

        'silver' => [
            'enabled'  => true,
            'route'    => 'membership_silver',
            'view'     => 'v2/membership/silver',
            'name'     => 'Silver',
            'option'   => null,
            'label'    => 'Silver',
            'value'    => 'silver',
            'title'    => 'Silver Membership',
            'subtitle' => 'Annual membership',
            'hero'     => 'v2/img/membership/2beach-club-silver-hero.webp',
            'band'     => '#5f707c',
            'gallery'  => [
                ['src' => 'v2/img/membership/2beach-club-silver-gallery-1.webp', 'alt' => 'Guests on the 2Beach Club beach terrace'],
                ['src' => 'v2/img/membership/2beach-club-silver-gallery-2.webp', 'alt' => 'Burger buffet at the 2Beach Club restaurant'],
                ['src' => 'v2/img/membership/2beach-club-silver-gallery-3.webp', 'alt' => 'Canapés served at the 2Beach Club restaurant'],
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
                'shuttle'    => ['no'],
                'guests'     => ['yes', '2 per year'],
                'tenants'    => ['no'],
                'discount'   => ['yes', '5%'],
            ],
        ],

        'holiday-tenants' => [
            // No longer a membership tier: tenants are included in Platinum memberships
            'enabled'  => false,
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
                'shuttle'    => ['yes'],
                'guests'     => ['no'],
                'discount'   => ['no'],
            ],
        ],

    ],
];
