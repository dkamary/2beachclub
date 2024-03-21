<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function downloadMenu() {
        $filePath = public_path('downloads/2024-03-18-2BC-menus_Marideal.pdf');

        if (file_exists($filePath)) {

            return response()->download($filePath);
        } else {

            return response(sprintf('File `%s` not found', $filePath), 404);
        }
    }

    public function menuMarideal() {
        $filepath = public_path('downloads/2024-03-18-2BC-menus_Marideal.pdf');

        if (file_exists($filepath)) {

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }

    public function menuEaster() {
        $filepath = public_path('downloads/2024-03-19-Easter-Menu-2BC.pdf');

        if (file_exists($filepath)) {

            return response()->download($filepath);
        } else {

            return response(sprintf('File `%s` not found', $filepath), 404);
        }
    }
}
