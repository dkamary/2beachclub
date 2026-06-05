<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\V2\DefaultController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefaultController::class, 'home'])->name('home');
Route::get('/become-member', [DefaultController::class, 'become_member'])->name('become_member');

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
