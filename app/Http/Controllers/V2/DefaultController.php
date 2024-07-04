<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

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

    public function events(): View
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

    public function newsletter(Request $request): View
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        $client = new Client();
        try {
            $response = $client->get(
                sprintf('https://app.engagebay.com/dev/api/panel/subscribers/contact-by-email/%s', $data['email'] ?? 'no-email@email-impossible.com'),
                [
                    'verify' => false,
                    'headers' => [
                        'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                        // 'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                        'Accept' => 'application/json',
                    ]
                ]
            );

            if ($response->getStatusCode() != 200) {

                ddd($client, $response);
            }

            $contact = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            if (!empty($contact)) {
                // On ajoute une note
                $addNote = new Client();
                $displayName = '';

                if (!empty($contact['fullname'])) {
                    $displayName = trim($contact['fullname']);
                } else {
                    if (!empty($contact['firstname'])) {
                        $displayName = trim($contact['firstname']);
                    }
                    if (!empty($contact['lastname'])) {
                        $displayName .= (!empty($displayName) ? ' ' : '') . trim($contact['lastname']);
                    }
                    if (empty($displayName)) {
                        $displayName = $data['email'];
                    }
                }

                try {
                    $body = [
                        'parentId' => $contact['id'] ?? 0,
                        'subject' => sprintf('Contact `%s` subscribe again to our 2Beach Club newsletter', $displayName),
                        'content' => sprintf('Contact `%s` subscribe again to our 2Beach Club newsletter', $displayName)
                    ];

                    $addNoteResponse = $addNote->post(
                        'https://app.engagebay.com/dev/api/panel/notes',
                        [
                            'verify' => false,
                            'headers' => [
                                'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                                // 'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                            ],
                            'json' => $body,
                        ]
                    );

                    if ($addNoteResponse->getStatusCode() != 200) {

                        dd($addNote, $addNoteResponse);
                    }
                } catch (ClientException $ex3) {
                    throw $ex3;
                }
            } else {

                throw new Exception('Contact not found ????');
            }
        } catch (ClientException $ex1) {
            if ($ex1->getCode() == 400 && Str::of($ex1->getMessage())->contains(['There is no contact exists with email'])) {

                try {
                    // On crèe le contact
                    $createContact = new Client();
                    $body = [
                        'score' => 5,
                        'properties' => [
                            [
                                'name' => 'email',
                                'value' => trim($data['email']),
                                'field_type' => 'TEXT',
                                'is_searchable' => false,
                                'type' => 'SYSTEM'
                            ],
                            [
                                'name' => 'Lead_Source',
                                'value' => 'Newsletter',
                                'field_type' => 'LIST',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Source_Details',
                                'value' => '2Beach Club Website',
                                'field_type' => 'LIST',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Lead_Status',
                                'value' => 'Subscriber',
                                'field_type' => 'LIST',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Contact_Type',
                                'value' => 'Lead',
                                'field_type' => 'LIST',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Email_Valid?',
                                'value' => 'Yes',
                                'field_type' => 'LIST',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Can_We_Contact?',
                                'value' => 'Yes',
                                'field_type' => 'LIST',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Interested_In',
                                'value' => '2Beach Club',
                                'field_type' => 'LIST',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Source_Webpage',
                                'value' => route('home'),
                                'field_type' => 'TEXT',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                            [
                                'name' => 'Referral_Url',
                                'value' => $request->headers->get('referrer', $_SERVER['HTTP_REFERER'] ?? null),
                                'field_type' => 'TEXT',
                                'is_searchable' => false,
                                'type' => 'CUSTOM'
                            ],
                        ],
                        'tags' => [
                            ['tag' => '2Beach Club Newsletter'],
                            ['tag' => 'Subscriber']
                        ]
                    ];
                    $createContactResponse = $createContact->post(
                        'https://app.engagebay.com/dev/api/panel/subscribers/subscriber',
                        [
                            'verify' => false,
                            'headers' => [
                                'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                                // 'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                            ],
                            'json' => $body,
                        ]
                    );

                    if ($createContactResponse->getStatusCode() != 200) {

                        ddd($createContact, $createContactResponse);
                    }
                } catch (ClientException $ex2) {

                    throw $ex2;
                }
            }
        }

        return view('v2.thank-you');
    }
}
