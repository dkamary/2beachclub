<?php

use App\Http\Controllers\V2\DefaultController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefaultController::class, 'home'])->name('home');
Route::get('/become-member', [DefaultController::class, 'become_member'])->name('become_member');

Route::prefix('/events')->group(function(){

    Route::get('', [DefaultController::class, 'events'])->name('events');
    Route::get('/private-gatherings', [DefaultController::class, 'private_gathering'])->name('private_gathering');
    Route::get('/meetings', [DefaultController::class, 'meetings'])->name('event_meetings');
    Route::get('/weddgings-and-celebrations', [DefaultController::class, 'weddings_and_celebrations'])->name('event_weddings_and_celebrations');

});

Route::get('/event/{slug}', [DefaultController::class, 'event'])->name('event');
Route::post('/newsletter/subscribe', [DefaultController::class, 'newsletter'])->name('newsletter_subscribe');
