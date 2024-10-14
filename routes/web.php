<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\V2\MenuController;
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

// Route::get('/', [HomeController::class, 'index'])->name('home_page');
Route::get('/coming-soon', [HomeController::class, 'coming_soon'])->name('coming_soon');
Route::get('/landing-page', [HomeController::class, 'landing'])->name('landing_page');
Route::get('/thank-you', [HomeController::class, 'landing_thankyou'])->name('landing_thankyou');

Route::post('/submit-contact', [FormController::class, 'submit'])->name('form_submit');

Route::prefix('booking')->group(function () {
    Route::get('/tracking', [BookingController::class, 'tracking'])->name('booking_tracking');
});

Route::prefix('restaurant')->group(function () {

    // Route::redirect('{any}', '/')->where('any', '.*'); // Used to deactivate the menu

    Route::get('/our-menus', [MenuController::class, 'index'])->name('menu_index');
    Route::get('/menu.pdf', [MenuController::class, 'menu'])->name('download_menu');
    Route::get('/menu-marideal.pdf', [MenuController::class, 'mari_deal'])->name('menu_marideal');
    Route::get('/menu-easter-brunch.pdf', [MenuController::class, 'easter_brunch'])->name('menu_easter');
    Route::get('/menu-sunday-brunch.pdf', [MenuController::class, 'sunday_brunch'])->name('menu_sunday');
    Route::get('/menu-sundowner.pdf', [MenuController::class, 'sundowner'])->name('menu_sunset');
    Route::get('/menu-kids.pdf', [MenuController::class, 'kids'])->name('menu_kids');
    Route::get('/menu-all-day-dining-en.pdf', [MenuController::class, 'all_day_en'])->name('menu_all_day_en');
    Route::get('/menu-all-day-dining-fr.pdf', [MenuController::class, 'all_day_fr'])->name('menu_all_day_fr');
    Route::get('/menu-sushi.pdf', [MenuController::class, 'sushi'])->name('menu_sushi');
    Route::get('/menu-cocktails.pdf', [MenuController::class, 'cocktails'])->name('menu_cocktails');
    Route::get('/menu-drinks.pdf', [MenuController::class, 'drinks'])->name('menu_drinks');
    Route::get('/menu-brunch-for-a-cause.pdf', [MenuController::class, 'brunch_for_cause'])->name('menu_brunch_for_a_cause');

});

// Second version
include 'v2/routes.php';

Route::prefix('new')->group(function () {

    // include 'v2/routes.php';

    Route::get('/', function () {
        return redirect()->route('home', [], 301);
    });
});

Route::get('/v2', function () {
    return redirect()->route('home');
});
