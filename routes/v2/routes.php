<?php

use App\Http\Controllers\V2\DefaultController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefaultController::class, 'home'])->name('home');
// Route::get('/restaurant', [DefaultController::class, 'restaurant'])->name('restaurant');
// Route::get('/beach-and-pool', [DefaultController::class, 'beach_pool'])->name('beach_pool');
// Route::get('/rooftop', [DefaultController::class, 'rooftop'])->name('rooftop');
// Route::get('/events', [DefaultController::class, 'events'])->name('events');
// Route::get('/the-team', [DefaultController::class, 'the_team'])->name('the_team');
// Route::get('/contact', [DefaultController::class, 'contact'])->name('contact');
Route::get('/become-member', [DefaultController::class, 'become_member'])->name('become_member');
