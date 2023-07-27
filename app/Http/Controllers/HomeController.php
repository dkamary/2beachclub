<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function landing(): View
    {
        return view('home.landing');
    }

    public function landing_thankyou() : View
    {
        return view('home.thankyou');
    }
}
