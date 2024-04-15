<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DefaultController extends Controller
{
    public function home(): View
    {
        return view('v2/home');
    }

    public function restaurant(): View
    {
        return view('v2/restaurant');
    }

    public function beach_pool(): View
    {
        return view('v2/beach-pool');
    }

    public function rooftop(): View
    {
        return view('v2/rooftop');
    }

    public function events(): View
    {
        return view('v2/events');
    }

    public function the_team(): View
    {
        return view('v2/the-team');
    }

    public function contact(): View
    {
        return view('v2/contact');
    }

}
