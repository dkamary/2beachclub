<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Managers\TrackingManager;
use Illuminate\View\View;

class MembershipController extends Controller
{
    public function platinum_permanent(): View
    {
        return $this->tier('platinum-permanent');
    }

    public function platinum_annual(): View
    {
        return $this->tier('platinum-annual');
    }

    public function gold(): View
    {
        return $this->tier('gold');
    }

    public function silver(): View
    {
        return $this->tier('silver');
    }

    public function holiday_tenants(): View
    {
        return $this->tier('holiday-tenants');
    }

    private function tier(string $slug): View
    {
        $tiers = config('membership_tiers.tiers');
        $tier = $tiers[$slug];

        TrackingManager::pageView(route($tier['route']));

        return view($tier['view'], [
            'slug'     => $slug,
            'tier'     => $tier,
            'tiers'    => $tiers,
            'benefits' => config('membership_tiers.benefits'),
        ]);
    }
}
