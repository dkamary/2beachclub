<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\V2\DefaultController;
use App\Http\Controllers\V2\MembershipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefaultController::class, 'home'])->name('home');
Route::get('/become-member', [DefaultController::class, 'become_member'])->name('become_member');

Route::prefix('/become-member')->group(function () {
    Route::get('/platinum-permanent', [MembershipController::class, 'platinum_permanent'])->name('membership_platinum_permanent');
    Route::get('/platinum-annual', [MembershipController::class, 'platinum_annual'])->name('membership_platinum_annual');
    Route::get('/gold', [MembershipController::class, 'gold'])->name('membership_gold');
    Route::get('/silver', [MembershipController::class, 'silver'])->name('membership_silver');
    Route::get('/holiday-tenants', [MembershipController::class, 'holiday_tenants'])->name('membership_holiday_tenants');
});

Route::prefix('/events')->group(function () {

    Route::get('', [DefaultController::class, 'events'])->name('events');
    Route::get('/private-gatherings', [DefaultController::class, 'private_gathering'])->name('private_gathering');
    Route::get('/meetings', [DefaultController::class, 'meetings'])->name('event_meetings');
    Route::get('/weddings-and-celebrations', [DefaultController::class, 'weddings_and_celebrations'])->name('event_weddings_and_celebrations');
    Route::get('/weddgings-and-celebrations', function () {
        return redirect()
            ->route('event_weddings_and_celebrations', [], 301);
    });
});

Route::get('/event/{slug}', [DefaultController::class, 'event'])->name('event');

Route::prefix('/newsletter')->group(function () {

    Route::post('/subscribe', [DefaultController::class, 'newsletter'])
        ->name('newsletter_subscribe');

    Route::get('/subscribe', [DefaultController::class, 'newsletter_get'])
        ->name('newsletter_subscribe_get');

    Route::get('/thankyou', [DefaultController::class, 'thankyou'])
        ->name('newsletter_thankyou');

    Route::get('/unsubscribe/{email}', [DefaultController::class, 'unsubscribe'])
        ->name('newsletter_unsubscribe');
});

Route::get('/generate-sitemap', [SitemapController::class, 'generate'])->name('sitemap.generator');

Route::get('/whatsapp-reservation', function () {
    return redirect('https://lnk.2futures.com?url=2bc-reservation-whatsapp', 301);
})->name('whatsapp_reservation');

// New reservation link
Route::get('/restaurant/reservation', function () {
    return redirect('https://lnk.2futures.com/eatapp-reservation', 301);
})->name('restaurant_reservation');