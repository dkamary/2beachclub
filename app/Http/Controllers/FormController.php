<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request)/*: RedirectResponse*/
    {
        $membership = $request->input('membership');
        $firstname = $request->input('name');
        $lastname = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $phone_number = $request->input('phone_number');
        $residence = $request->input('residence');
        $unit_number = $request->input('unit_number');

        $data = [
            'membership' => $membership,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'phone_number' => $phone_number,
            'residence' => $residence,
            'unit_number' => $unit_number,
        ];

        $headers = "MIME-Version: 1.0 \r\n";
        $headers .= "Content-type:text/html;charset=UTF-8 \r\n";
        $headers .= "From: 2Futures <noreply@2beachclub.mu> \r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion() ."\r\n";
        $headers .= 'BCC: donatkamary@gmail.com';

        $to = config('2beachclub.marketing_team.recipients', 'dk@2futures.com');
        $subject = '[2Beach Club Membership] - New submission';
        $content = view('notifications.emails.new-submission', $data)->render();
        // return view('notifications.emails.new-submission', $data);

        mail($to, $subject, $content, $headers);

        return response()->redirectToRoute('landing_thankyou');
    }

}
