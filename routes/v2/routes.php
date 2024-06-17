<?php

use App\Http\Controllers\V2\DefaultController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefaultController::class, 'home'])->name('home');
Route::get('/become-member', [DefaultController::class, 'become_member'])->name('become_member');
Route::get('/events', [DefaultController::class, 'events'])->name('events');
