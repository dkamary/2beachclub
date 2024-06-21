<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DefaultController extends Controller
{
    public function home(): View
    {
        return view('v2/home');
    }

    public function become_member(): View
    {
        return view('v2/become-member');
    }

    public function events():  View
    {
        return view('v2/events');
    }

    public function event(string $slug): View
    {
        $event = Event::query()
            ->where('slug', 'LIKE', $slug)
            ->first();

        if (!$event) {
            abort(404, 'Event not found');
        }

        return view('v2/events', [
            'event' => $event,
        ]);
    }
}
