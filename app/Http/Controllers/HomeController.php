<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        if (request()->has('old')) {
            return view('home.index');
        }

        return view('home.coming-soon');
    }

    public function coming_soon()
    {
        if (request()->input('old')) {
            return view('home.coming-soon');
        }

        return redirect()->route('home_page');
    }

    public function landing()
    {
        if (request()->input('old')) {
            return view('home.landing');
        }

        return redirect()->route('home_page');
    }

    public function landing_thankyou()
    {
        if (request()->input('old')) {
            // return view('home.thankyou');
            return view('v2.thank-you');
        }

        return redirect()->route('home_page');
    }
}
