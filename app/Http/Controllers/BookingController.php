<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function tracking(Request $request): RedirectResponse
    {
        $tracker = $this->create_tracking();
        $id = $this->add_info($request, $tracker);
        fclose($tracker);
        $booking_url = config('2beachclub.booking.url', 'https://www.sevenrooms.com/reservations/2beachclub');

        return redirect()
            ->away($booking_url . '?trackid=' . $id);
    }

    private function create_tracking()
    {
        $directory = public_path('tracking');
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
            $gitignore = fopen($directory. DIRECTORY_SEPARATOR . '.gitignore', 'w+');
            fputs($gitignore, "*\n!.gitignore");
            fclose($gitignore);
        }
        $filename = $directory. DIRECTORY_SEPARATOR . 'tracker-' . config('app.name') . '.log';
        $tracker = fopen($filename, 'a+');

        return $tracker;
    }

    private function add_info(Request &$request, &$tracker)
    {
        $id = uniqid();
        $referer = $request->headers->get('referer') ?? $_SERVER['HTTP_REFERER'] ?? '';
        fputcsv($tracker, [
            $id,
            date('Y-m-d H:i:s'),
            $request->ip(),
            $request->userAgent(),
            $referer,
        ], ';', '"');

        return $id;
    }
}
