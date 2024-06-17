<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('get_meta')) {

    function get_meta(): array
    {
        $meta = [];
        $route = Route::current();
        $routeName = $route->getName();

        if ($routeName == 'home') {
            $meta = config('meta.page.index');
        } elseif (strpos($routeName, 'event') !== false) {
            $meta = config('meta.page.events');
        } elseif ($routeName == 'become_member' || strpos($routeName, 'membership') !== false) {
            $meta = config('meta.page.membership');
        } else {
            $meta = config('meta.page.index');
        }

        return $meta;
    }
}
