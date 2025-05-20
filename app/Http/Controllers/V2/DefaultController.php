<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Managers\CRMManager;
use App\Managers\MailManager;
use App\Managers\TrackingManager;
use App\Models\Event;
use App\Models\Transaction\Result;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DefaultController extends Controller
{
    public function home(): View
    {
        TrackingManager::pageView(route('home'));

        return view('v2/home');
    }

    public function become_member(): View
    {
        TrackingManager::pageView(route('become_member'));

        return view('v2/become-member');
    }

    public function events(): View
    {
        TrackingManager::pageView(route('events'));

        return view('v2/events');
    }

    public function event(string $slug): View
    {
        TrackingManager::pageView(route('events'));

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
        TrackingManager::submit(route('newsletter_subscribe'));

        // honey pot verification
        $honeyPot = trim($request->input('reflex', ''));
        if (!empty($honeyPot)) {

            // Robots trap
            Log::warning('Robots spammeur detecté', $request->all());

            return view('v2.thank-you');
        }

        // $names = explode(' ', trim($data['name']));
        $name = trim($request->input('name'));
        $lastname = trim($request->input('last_name'));
        $email = trim($request->input('email'));

        // Custom spam filter
        if ($this->is_spam($name . ' ' . $lastname, $email)) {

            Log::warning('Lead submission detected as spam', $request->all());

            return view('v2.thank-you');
        }

        // // Google recaptcha
        // $secret = config('2beachclub.recaptcha.secret');
        // $response = $_POST['g-recaptcha-response'];
        // $remoteip = $_SERVER['REMOTE_ADDR'];

        // $url = 'https://www.google.com/recaptcha/api/siteverify';
        // $data = array('secret' => $secret, 'response' => $response, 'remoteip' => $remoteip);

        // $options = array(
        //     'http' => array(
        //         'method' => 'POST',
        //         'content' => http_build_query($data)
        //     )
        // );

        // $context = stream_context_create($options);
        // $verify = file_get_contents($url, false, $context);
        // $captcha_success = json_decode($verify);

        // if (!$captcha_success->success) {
        //     // Le reCAPTCHA est invalide, affichez un message d'erreur

        //     // Robots trap
        //     Log::warning('reCAPTCHA not valid', $request->all());

        //     return view('v2.thank-you');
        // }

        $data = [];

        try {
            $data = $request->validate([
                'email' => 'required|email',
                'name' => 'required|string|max:150',
                'last_name' => 'required|string|max:150',
            ]);
        } catch (ValidationException $ex) {
            $data = [
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
            ];
        }

        $client = new Client();
        try {
            $response = $client->get(
                sprintf('https://app.engagebay.com/dev/api/panel/subscribers/contact-by-email/%s', $data['email'] ?? 'no-email@email-impossible.com'),
                [
                    'verify' => false,
                    'headers' => [
                        // 'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                        'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                        'Accept' => 'application/json',
                    ]
                ]
            );

            if ($response->getStatusCode() != 200) {

                // ddd($client, $response);
                throw new Exception(sprintf('Unexpected error: %s [%d]', $response->getReasonPhrase(), $response->getStatusCode()));
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
                                // 'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                                'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                            ],
                            'json' => $body,
                        ]
                    );

                    if ($addNoteResponse->getStatusCode() != 200) {

                        // dd($addNote, $addNoteResponse);
                        throw new Exception(sprintf('Unexpected error: %s [%d]', $addNoteResponse->getReasonPhrase(), $addNoteResponse->getStatusCode()));
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
                    // $names = explode(' ', trim($data['name']));
                    $name = trim($data['name']);
                    $lastname = trim($data['last_name']);
                    $email = trim($data['email']);

                    // Custom spam filter
                    if ($this->is_spam($name . ' ' . $lastname, $email)) {

                        Log::warning('Lead submission detected as spam', $request->all());

                        return view('v2.thank-you');
                    }

                    // On crèe le contact
                    $createContact = new Client();
                    $body = [
                        'score' => 5,
                        'properties' => [
                            [
                                'name' => 'email',
                                'value' => $email,
                                'field_type' => 'TEXT',
                                'is_searchable' => false,
                                'type' => 'SYSTEM'
                            ],
                            [
                                'name' => 'name',
                                'value' => $name,
                                'field_type' => 'TEXT',
                                'is_searchable' => true,
                                'type' => 'SYSTEM',
                            ],
                            [
                                'name' => 'last_name',
                                'value' => $lastname,
                                'field_type' => 'TEXT',
                                'is_searchable' => true,
                                'type' => 'SYSTEM',
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
                                'value' => $request->referral_url ?? '',
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
                                // 'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                                'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                            ],
                            'json' => $body,
                        ]
                    );

                    if ($createContactResponse->getStatusCode() != 200) {

                        // ddd($createContact, $createContactResponse);
                        throw new Exception(sprintf('Unexpected error: %s [%d]', $createContactResponse->getReasonPhrase(), $createContactResponse->getStatusCode()));
                    }
                } catch (ClientException $ex2) {

                    throw $ex2;
                }
            }
        }

        // We send email here
        $email = trim($data['email']);
        $content = view('v2.mail.thank-you', ['email' => $email])->render();
        MailManager::send($email, 'Thank you for joining the 2Beach Club community!', $content);

        Log::info(sprintf('Subscriber "%s" <%s>', $data['name'] . ' ' . $data['last_name'], $data['email']), $data);

        return view('v2.thank-you');
    }

    public function newsletter_get(): RedirectResponse
    {
        return redirect()
            ->route('home', [], 301);
    }

    public function private_gathering(): View
    {
        TrackingManager::pageView(route('private_gathering'));

        return view('v2/private-gathering');
    }

    public function meetings(): View
    {
        TrackingManager::pageView(route('event_meetings'));

        return view('v2/meetings-events');
    }

    public function weddings_and_celebrations(): View
    {
        TrackingManager::pageView(route('event_weddings_and_celebrations'));

        return view('v2/weddings-celebrations');
    }

    public function thankyou(): View
    {
        return view('v2.mail.thank-you');
    }

    public function unsubscribe(string $email): View
    {
        // ddd($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return view('v2.exception', [
                'title' => 'Non well formed email',
                'exception' => 'Non well formed email',
            ]);
        }

        $contact = null;
        $client = new Client();
        try {
            $response = $client->get(
                sprintf('https://app.engagebay.com/dev/api/panel/subscribers/contact-by-email/%s', $email),
                [
                    'verify' => false,
                    'headers' => [
                        // 'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                        'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                        'Accept' => 'application/json',
                    ]
                ]
            );

            if ($response->getStatusCode() != 200) {
                // ddd($response);
                return view('v2.exception', [
                    'title' => sprintf('Error: %d', $response->getStatusCode()),
                    'exception' => sprintf('Unexpected error during the request to the CRM: %s [%d]', $response->getReasonPhrase(), $response->getStatusCode()),
                ]);
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
                        $displayName = $email;
                    }
                }

                try {
                    $body = [
                        'parentId' => $contact['id'] ?? 0,
                        'subject' => sprintf('Contact `%s` unsubscribe from our 2Beach Club newsletter', $displayName),
                        'content' => sprintf('Contact `%s` unsubscribe from our 2Beach Club newsletter', $displayName)
                    ];

                    $addNoteResponse = $addNote->post(
                        'https://app.engagebay.com/dev/api/panel/notes',
                        [
                            'verify' => false,
                            'headers' => [
                                // 'Authorization' => '8qddhtf1cfmi8g6p2fmv0akg59', // Test
                                'Authorization' => 'o39t0g1n0bk3h7sr0vti9t1son', // Prod
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                            ],
                            'json' => $body,
                        ]
                    );

                    if ($addNoteResponse->getStatusCode() != 200) {

                        // ddd($addNote, $addNoteResponse);
                        return view('v2.exception', [
                            'title' => sprintf('Error: %d', $addNoteResponse->getStatusCode()),
                            'exception' => sprintf('Unexpected error during adding note: %s [%d]', $addNoteResponse->getReasonPhrase(), $addNoteResponse->getStatusCode()),
                        ]);
                    }
                } catch (ClientException $ex3) {
                    // ddd($ex3);
                    return view('v2.exception', [
                        'title' => sprintf('Error: %d', $ex3->getCode()),
                        'exception' => sprintf(
                            'Error Code: %d<br>Error Message: %s<br>File: %s<br>Line: %d',
                            $ex3->getCode(),
                            $ex3->getMessage(),
                            $ex3->getFile(),
                            $ex3->getLine()
                        ),
                    ]);
                }
            } else {
                // ddd('Contact not found ????');
                throw new Exception('Contact not found ????');
            }
        } catch (ClientException $ex1) {

            if ($ex1->getCode() == 400 && Str::of($ex1->getMessage())->contains(['There is no contact exists with email'])) {

                return view('v2.unsubscribed', [
                    'contact' => $contact,
                    'result' => new Result(
                        status: Result::DONE,
                        message: 'You have been unsubscribed from 2Beach Club newsletters',
                        data: $contact,
                    ),
                ]);
            }


            // throw $ex1;
            // Don't do anything: He/She wants to unsubscribe and he is not in the CRM so it's OK
        }

        if ($contact) {
            // Unsubscribe
            $client = new Client([
                'verify' => false
            ]);

            $payload = [
                'id' => (int)($contact['id'] ?? null),
                'properties' => [
                    [
                        'name' => 'Can_We_Contact?',
                        'value' => 'Yes',
                        'field_type' => 'LIST',
                        'is_searchable' => false,
                        'type' => 'CUSTOM'
                    ],
                ]
            ];
            // dd($payload);

            try {
                $response = $client->put(
                    'https://app.engagebay.com/dev/api/panel/subscribers/update-partial',
                    [
                        'headers' => [
                            'Authorization' => config('engagebay.api_key_prod'),
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json'
                        ],
                        'json' => $payload
                    ]
                );
            } catch (Exception $ex) {
                Log::debug($ex->getMessage(), [
                    'payload' => $payload,
                    'key' => config('engagebay.api_key_prod'),
                ]);
            }
        }

        // ddd($contact);

        return view('v2.unsubscribed', [
            'contact' => $contact,
            // 'result' => $result,
        ]);
    }

    private function is_spam(string $name, string $email, int $scoreRef = 4): bool
    {
        $score = 0;

        // Règle 1 : Analyse du ratio majuscules/minuscules dans chaque mot
        $words = explode(' ', $name);
        foreach ($words as $word) {
            if (empty($word)) continue;

            $uppercaseCount = preg_match_all('/[A-Z]/', $word);
            $lowercaseCount = preg_match_all('/[a-z]/', $word);
            $wordLength = strlen($word);

            // Format nom normal : première lettre majuscule, reste en minuscules
            $isNormalName = ($uppercaseCount === 1 && $word[0] === strtoupper($word[0]) &&
                $lowercaseCount === ($wordLength - 1));

            if (!$isNormalName) {
                // Si le mot a trop de majuscules par rapport aux minuscules
                if ($uppercaseCount > 1 && $lowercaseCount > 0) {
                    $score += 2;
                    // dump('le mot a trop de majuscules par rapport aux minuscules');
                }
                // Si le mot est tout en majuscules et long
                if ($uppercaseCount === $wordLength && $wordLength > 3) {
                    $score += 1;
                    // dump('le mot est tout en majuscules et long');
                }
            }

            // Pénaliser les mots vraiment longs
            if ($wordLength > 15) {
                $score += 1;
                // dump('mots vraiment longs');
            }
        }

        // Règle 2 : Vérifier la présence de consonnes consécutives
        if (preg_match('/[bcdfghjklmnpqrstvwxz]{5,}/i', $name)) {
            $score += 2;
            // dump('consonnes consécutives');
        }

        // Règle 3 : Vérifier les caractères spéciaux ou chiffres dans le nom
        if (preg_match('/[0-9\W]/', $name)) {
            $score += 2;
            // dump('caractères spéciaux ou chiffres dans le nom');
        }

        // Règle 4 : Analyse de l'email
        $localPart = strstr($email, '@', true);
        $domain = substr(strrchr($email, "@"), 1);

        // Vérifier si l'email suit un format courant pour un nom réel
        // (ex: prenom.nom, p.nom, prenom_nom, prenomnom)
        $isCommonEmailFormat = preg_match('/^[a-z]+\.?[a-z]*$/i', $localPart) ||
            preg_match('/^[a-z]\.[a-z]+$/i', $localPart) ||
            preg_match('/^[a-z]+_[a-z]+$/i', $localPart);

        if (!$isCommonEmailFormat) {
            // Vérifier les séquences de lettres aléatoires
            if (preg_match('/[a-z]{10,}/', $localPart)) {
                $score += 2;
                // dump('séquences de lettres aléatoires');
            }

            // Détecter les motifs numériques
            if (preg_match('/[0-9]{3,}/', $localPart)) {
                $score += 2;
                // dump('motifs numériques');
            }
        }

        // Vérifier les combinaisons de mots suspects dans l'email
        $spamWords = ['ghost', 'shadow', 'dark', 'cyber', 'phantom', 'umbra', 'glyph', 'wraith', 'sylvan'];
        foreach ($spamWords as $word) {
            if (stripos($localPart, $word) !== false) {
                $score += 2;
                // dump('combinaisons de mots suspects dans l\'email');
                break;
            }
        }

        // Vérifier les domaines populaires
        $popularDomains = ['yahoo.com', 'gmail.com', 'outlook.com', 'hotmail.com'];
        if (in_array($domain, $popularDomains)) {
            if (!$isCommonEmailFormat && strlen($localPart) > 12) {
                // dump(' domaines populaires');
                $score += 1;
            }
        }

        // dump('Score: ' . $score);

        // DEBUG: Afficher le score détaillé
        error_log("Name Analysis - Name: $name, Score: $score");
        error_log("Email Analysis - Email: $email, Score: $score");

        return $score > $scoreRef;
    }
}
