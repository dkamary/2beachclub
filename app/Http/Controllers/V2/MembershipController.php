<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Managers\TrackingManager;
use Illuminate\Http\RedirectResponse; // used by the disabled tenants redirect
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

    /**
     * 2Futures Holidays tenants are no longer a tier: their access is
     * included in Platinum memberships. Page still reachable by its URL
     * (hidden from banners and "Other memberships").
     */
    public function holiday_tenants(): View
    {
        // Redirect temporarily disabled for review:
        // return redirect()->route('become_member', [], 301);

        return $this->tier('holiday-tenants');
    }

    private function tier(string $slug): View
    {
        $allTiers = config('membership_tiers.tiers');
        $tier = $allTiers[$slug];
        $tiers = array_filter($allTiers, fn ($tier) => $tier['enabled'] ?? true);

        TrackingManager::pageView(route($tier['route']));

        return view($tier['view'], [
            'slug'     => $slug,
            'tier'     => $tier,
            'tiers'    => $tiers,
            'benefits' => config('membership_tiers.benefits'),
            'tenantBenefits' => config('membership_tiers.tenant_benefits'),
        ]);
    }
}
