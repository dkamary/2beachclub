<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Managers\TrackingManager;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(): View
    {
        TrackingManager::pageView(route('menu_index'));

        return view('menu');
    }

    public function menu(){
        $filePath = public_path('downloads/2024-03-18-2BC-menus_Marideal.pdf');

        if (file_exists($filePath)) {
            TrackingManager::download(route('download_menu'));

            return response()->download($filePath);
        } else {

            return response(sprintf('File `%s` not found', $filePath), 404);
        }
    }

    public function mari_deal(){
        $filepath = public_path('downloads/2024-03-18-2BC-menus-Mari-deal-Web.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_marideal'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function easter_brunch(){
        $filepath = public_path('downloads/2024-03-19-Easter-Menu-2BC.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_easter'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function sunday_brunch(){
        $filepath = public_path('downloads/2beach-club-sunday-brunch-menu.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_sunday'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function sundowner(){
        $filepath = public_path('downloads/2beach-club-sundowner-menu.jpg');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_sunday'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function kids(){
        $filepath = public_path('downloads/Kids-Menu.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_kids'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function all_day(){
        $filepath = public_path('downloads/All-Day-Dining-Menu.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_all_day_dining'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function sushi(){
        $filepath = public_path('downloads/Sushi-Menu.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_sushi'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function cocktails(){
        $filepath = public_path('downloads/2024-07-08-2BCmenus-new-COCKTAILS-Digital.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_cocktails'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function drinks(){
        $filepath = public_path('downloads/2024-07-17-2BCmenus-new-DRINK-Digital.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_drinks'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function brunch_for_cause(){
        $filepath = public_path('downloads/Brunch-For-A-Cause-Exclusive-Invite.pdf');

        if (file_exists($filepath)) {
            TrackingManager::download(route('menu_brunch_for_a_cause'));

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

}
