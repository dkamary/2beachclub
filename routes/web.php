<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home_page');
Route::get('/landing-page', [HomeController::class, 'landing'])->name('landing_page');
Route::get('/thank-you', [HomeController::class, 'landing_thankyou'])->name('landing_thankyou');

Route::post('/submit-contact', [FormController::class, 'submit'])->name('form_submit');

Route::prefix('booking')->group(function(){
    Route::get('/tracking', [BookingController::class, 'tracking'])->name('booking_tracking');
});
