<?php

return [
    'platinium-1' => [
        'title' => 'Platinum<br>(Option 1)',
        'duration' => 'Permanent',
        'entrance' => 18000,
        'annual' => 400,
        'members' => 5,
        'restaurant' => true,
        'rooftop' => true,
        'pool' => true,
        'services' => true,
        'concierge' => true,
        'shuttle' => true,
        'guest' => 5,
        'tenants' => true,
        'discount' => 0.15,
        'boardroom' => '4hrs monthly',
    ],
    'platinium-2' => [
        'title' => 'Platinum<br>(Option 2)',
        'duration' => 'Annual',
        'entrance' => null,
        'annual' => 2000,
        'members' => 5,
        'restaurant' => true,
        'rooftop' => true,
        'pool' => true,
        'services' => true,
        'concierge' => true,
        'shuttle' => true,
        'guest' => 5,
        'tenants' => true,
        'discount' => 0.15,
        'boardroom' => '4hrs monthly',
    ],
    'gold' => [
        'title' => 'Gold',
        'duration' => 'Annual',
        'entrance' => null,
        'annual' => 1000,
        'members' => 5,
        'restaurant' => true,
        'rooftop' => true,
        'pool' => true,
        'services' => true,
        'concierge' => true,
        'shuttle' => false,
        'guest' => 5,
        'tenants' => false,
        'discount' => 0.10,
        'boardroom' => '2hrs monthly',
    ],
    'silver' => [
        'title' => 'Silver',
        'duration' => 'Annual',
        'entrance' => null,
        'annual' => 400,
        'members' => 4,
        'restaurant' => true,
        'rooftop' => true,
        'pool' => true,
        'services' => 'Subject to minimum consumption of USD 25 per person',
        'concierge' => 'Extra charge',
        'shuttle' => false,
        'guest' => 2,
        'tenants' => false,
        'discount' => 0.05,
        'boardroom' => 'Extra charge',
    ],
    'holiday-tenants' => [
        'title' => '2Futures<br>Holiday\'s<br>tenants',
        'duration' => '',
        'entrance' => null,
        'annual' => null,
        'members' => null,
        'restaurant' => true,
        'rooftop' => true,
        'pool' => true,
        'services' => 'Subject to minimum consumption of USD 35 per person',
        'concierge' => 'Extra charge',
        'shuttle' => true,
        'guest' => 2,
        'tenants' => 'N/A',
        'discount' => false,
        'boardroom' => false,
    ],
];
