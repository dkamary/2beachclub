<?php

namespace App\Http\Controllers;

use App\Managers\CRMManager;
use App\Models\Transaction\Result;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        try {
            $validated = $request->validate([
                'membership' => ['required', 'string', 'max:50'],
                'name' => ['required', 'string', 'max:150',],
                'last_name' => ['required', 'string', 'max:150',],
                'email' => ['required', 'email:rfc,dns', 'max:150',],
                'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:6', 'max:20'],
                'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:6', 'max:20'],
                'residence' => ['nullable', 'string', 'max:100'],
                'unit_number' => ['nullable', 'string', 'max:50']
            ]);

            $membership = Str::of($request->input('membership'))->trim()->limit(50)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();
            $firstname = Str::of($request->input('name'))->trim()->limit(150)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();
            $lastname = Str::of($request->input('last_name'))->trim()->limit(150)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();
            $email = Str::of($request->input('email'))->trim()->limit(150)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();
            $phone = Str::of($request->input('phone'))->trim()->limit(50)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();
            $phone_number = Str::of($request->input('phone_number'))->trim()->limit(50)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();
            $residence = Str::of($request->input('residence'))->trim()->limit(100)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();
            $unit_number = Str::of($request->input('unit_number'))->trim()->limit(50)->replace(['<', '>'], ['&lt;', '&gt;'])->__toString();

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
            $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
            $headers .= 'BCC: donatkamary@gmail.com';

            $to = config('2beachclub.marketing_team.recipients', 'dk@2futures.com');
            $subject = '[2Beach Club Membership] - New submission';
            $content = view('notifications.emails.new-submission', $data)->render();
            // return view('notifications.emails.new-submission', $data);

            mail($to, $subject, $content, $headers);

            // $result = $this->sendToCRM($data);
            // Log::info($result->getMessage(), $result->toArray());

            return response()->redirectToRoute('landing_thankyou', ['old' => uniqid()]);
        } catch (ValidationException $ex) {
            // dd($ex->validator);

            return back()
                ->withErrors($ex->validator)
                ->withInput();
        }
    }

    private function sendToCRM(array $data): Result
    {
        $email = $data['email'];
        $contact = CRMManager::getContactByEmail($email);
        if (!$contact || empty($contact)) {
            return CRMManager::addNewContact($data);
        }

        return CRMManager::updateContact((int)$contact['id'], $data);
    }
}
