<?php

namespace App\Managers;

use App\Models\Transaction\Result;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CRMManager
{
    const POST_FIELDS_EXCEPTION = ['_token'];

    const FIELD_TYPE_LIST = 'LIST';
    const FIELD_TYPE_TEXT = 'TEXT';
    const FIELD_TYPE_NUMBER = 'NUMBER';
    const FIELD_TYPE_DATE = 'DATE';
    const FIELD_TYPE_CHECKBOX = 'CHECKBOX';
    const FIELD_TYPE_TEXTAREA = 'TEXTAREA';
    const FIELD_TYPE_PHONE = 'PHONE';
    const FIELD_TYPE_URL = 'URL';
    const FIELD_TYPE_MULTICHECKBOX = 'MULTICHECKBOX';
    const TYPE_CUSTOM = 'CUSTOM';
    const TYPE_SYSTEM = 'SYSTEM';
    const SUBTYPE_PRIMARY = 'primary';
    const SUBTYPE_WORK = 'work';

    const VALUE_YES = 'Yes';
    const VALUE_NO = 'No';

    protected static $_headers = [
        'Authorization' => null,
        'Accept' => RequestManager::APPLICATION_JSON,
    ];

    public static function setHeaders(array $headers): void
    {
        self::$_headers = array_merge(self::$_headers, $headers);
    }

    public static function setHeader(string $key, string $value): void
    {
        self::$_headers[$key] = $value;
    }

    public static function getHeaders(): array
    {
        return self::$_headers;
    }

    public static function setAuthorization(string $key): void
    {
        self::$_headers['Authorization'] = $key;
    }

    public static function getContacts(): Result
    {

        return new Result();
    }

    public static function getContactById(string $id): ?array
    {
        return null;
    }

    public static function getContactByEmail(string $email): ?array
    {
        $uri = sprintf(config('engagebay.contact_by_email'), $email);
        $result = RequestManager::get($uri, self::getHeaders());

        if (!$result->isSuccess()) {
            Log::warning($result->getMessage(), compact('uri'));

            return null;
        }

        return $result->getData();
    }

    // public static function newContact($data = []): Contact
    // {
    //     $contact = new Contact();

    //     if (is_array($data)) $contact->hydrate($data);
    //     elseif ($data instanceof Request) $contact->hydrateFromRequest($data->all());

    //     return $contact;
    // }

    public static function prepareContact(array $data): array
    {
        $properties = [];

        $properties = [];

        if (!isset($data['name'])) {
            $name = Str::of($data['name'])
                ->trim()
                ->limit(150)
                ->replace(['<', '>'], ['&lt;', '&gt;']);

            $properties[] = [
                'name' => 'name',
                'value' => $name->__toString(),
                'field_type' => self::FIELD_TYPE_TEXT,
                'type' => self::TYPE_SYSTEM,
                'is_searchable' => true,
            ];
        }

        if (isset($data['lastname'])) {
            $lastname = Str::of($data['lastname'])
                ->trim()
                ->limit(150)
                ->replace(['<', '>'], ['&lt;', '&gt;']);

            $properties[] = [
                'name' => 'last_name',
                'value' => $lastname->__toString(),
                'field_type' => self::FIELD_TYPE_TEXT,
                'type' => self::TYPE_SYSTEM,
                'is_searchable' => true,
            ];
        }

        if (isset($data['email'])) {
            $email = Str::of($data['email'])
                ->trim()
                ->limit(255)
                ->replace(['<', '>'], ['&lt;', '&gt;']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Log::warning("Not well formed email `$email`", [
                    'email' => $email,
                    'raw_data' => $data['email'],
                ]);

                throw new Exception("Not well formed email `$email`");
            }

            $properties[] = [
                'name' => 'email',
                'value' => $email->__toString(),
                'field_type' => self::FIELD_TYPE_TEXT,
                'type' => self::TYPE_SYSTEM,
                'subtype' => self::SUBTYPE_PRIMARY,
                'is_searchable' => true,
            ];
        }

        if (isset($data['phone_number'])) {
            $phone = Str::of($data['phone_number'])
                ->trim()
                ->limit(20)
                ->replace(['<', '>'], ['&lt;', '&gt;']);

            $properties[] = [
                'name' => 'phone',
                'value' => $phone->__toString(),
                'field_type' => self::FIELD_TYPE_TEXT,
                'type' => self::TYPE_SYSTEM,
                'subtype' => self::SUBTYPE_WORK,
                'is_searchable' => true,
            ];
        }

        if (isset($data['residence'])) {
            $residence = Str::of($data['residence'])
                ->trim()
                ->limit(100)
                ->replace(['<', '>'], ['&lt;', '&gt;']);

            $properties[] = [
                'name' => 'phone',
                'value' => $residence->__toString(),
                'field_type' => self::FIELD_TYPE_TEXT,
                'type' => self::TYPE_CUSTOM,
                'is_searchable' => true,
            ];
        }

        if (isset($data['unit_number'])) {
            $unit = Str::of($data['unit_number'])
                ->trim()
                ->limit(100)
                ->replace(['<', '>'], ['&lt;', '&gt;']);

            $properties[] = [
                'name' => 'phone',
                'value' => $unit->__toString(),
                'field_type' => self::FIELD_TYPE_TEXT,
                'type' => self::TYPE_CUSTOM,
                'is_searchable' => true,
            ];
        }

        if (isset($data['membership'])) {
            $membership = Str::of($data['unit_nmembershipumber'])
                ->trim()
                ->limit(50)
                ->replace(['<', '>'], ['&lt;', '&gt;']);

            $properties[] = [
                'name' => 'Membership',
                'value' => $membership->__toString(),
                'field_type' => self::FIELD_TYPE_TEXT,
                'type' => self::TYPE_CUSTOM,
                'is_searchable' => true,
            ];
        }

        $contactData = [
            'score' => 5,
            'properties' => $properties,
        ];

        return $contactData;
    }

    public static function addNewContact(array $data): Result
    {
        Log::debug(__METHOD__, [
            'data' => $data
        ]);

        $uri = config('engagebay.contact_create');
        $result = RequestManager::post(
            uri: $uri,
            data2send: self::prepareContact($data),
            headers: self::getHeaders()
        );

        return $result;
    }

    public static function updateContact(int $contactId, array $data): Result
    {
        Log::debug(__METHOD__, [
            'contact_id' => $contactId,
            'data' => $data,
        ]);

        if ($contactId == 0) {
            Log::error("Update Contact => contactId can't be 0", [
                'contact_id' => $contactId,
                'data' => $data,
            ]);

            return new Result(
                Result::FAILED,
                'Contact ID can not be 0',
                array_merge(['contact_id', $contactId], $data)
            );
        }

        $uri = config('engagebay.contact_update');
        $result = RequestManager::put(
            $uri,
            [
                'id' => $contactId,
                'properties' => $data
            ],
            self::getHeaders()
        );

        return $result;
    }

    public static function deleteContact(int $contactId): Result
    {
        Log::debug(__METHOD__, [
            'contact_id' => $contactId,
        ]);

        if ($contactId == 0) {
            Log::error("delete Contact => contactId can't be 0", [
                'contact_id' => $contactId,
            ]);

            return new Result(
                status: Result::FAILED,
                message: 'Contact ID can not be 0',
                data: ['contact_id' => $contactId],
            );
        }

        $uri = sprintf(config('engagebay.contact_delete'), $contactId);
        $result = RequestManager::delete(
            uri: $uri,
            data2send: [],
            headers: self::getHeaders(),
            bodySend: false
        );

        return $result;
    }

    // public static function changeOwner(int|Contact $contact, string $ownerEmail): Result
    // {
    //     debug_app(__METHOD__, [
    //         'contact' => $contact,
    //         'owner_email' => $ownerEmail,
    //     ]);

    //     $contactId = is_int($contact) ? $contact : (int)$contact->id;

    //     if ($contactId == 0) {
    //         log_error("delete Contact => contactId can't be 0", [
    //             'contact' => $contact,
    //         ]);

    //         return new Result(
    //             status: Result::FAILED,
    //             message: 'Contact ID can not be 0',
    //             data: $contact
    //         );
    //     }

    //     $uri = sprintf(config('engagebay.contact_change_owner'), $contactId, $ownerEmail);
    //     $result = RequestManager::post(
    //         uri: $uri,
    //         headers: self::getHeaders(),
    //         data2send: []
    //     );

    //     return $result;
    // }

    // public static function addContactNote(int|Contact $contact, string $subject, string $content): Result
    // {
    //     debug_app(__METHOD__, [
    //         'contact' => $contact,
    //         'subject' => $subject,
    //         'content' => $content,
    //     ]);

    //     $contactId = is_int($contact) ? $contact : (int)$contact->id;

    //     if ($contactId == 0) {
    //         log_error("addContactNote => contactId can't be 0", [
    //             'contact' => $contact,
    //             'subject' => $subject,
    //             'content' => $content,
    //         ]);

    //         return new Result(
    //             status: Result::FAILED,
    //             message: 'Contact ID can not be 0',
    //             data: $contact
    //         );
    //     }

    //     $uri = config('engagebay.contact_add_note');

    //     $result = RequestManager::post(
    //         uri: $uri,
    //         headers: self::getHeaders(),
    //         data2send: [
    //             'parentId' => $contactId,
    //             'subject' => $subject,
    //             'content' => $content,
    //         ]
    //     );

    //     return $result;
    // }

    // public static function getAllContactNotes(int|Contact $contact): Result
    // {
    //     debug_app(__METHOD__, [
    //         'contact' => $contact,
    //     ]);

    //     $contactId = is_int($contact) ? $contact : (int)$contact->id;

    //     if ($contactId == 0) {
    //         log_error("Get All Contact Notes => contactId can't be 0", [
    //             'contact' => $contact,
    //         ]);

    //         return new Result(
    //             status: Result::FAILED,
    //             message: 'Contact ID can not be 0',
    //             data: $contact
    //         );
    //     }

    //     $uri = sprintf(config('engagebay.contact_notes'), $contactId);
    //     $result = RequestManager::get(
    //         uri: $uri,
    //         headers: self::getHeaders()
    //     );

    //     if (!$result->isSuccess()) return $result;

    //     $notes = [];
    //     foreach ($result->getData() as $data) {
    //         $notes[] = new ContactNote($data);
    //     }

    //     $result->setData($notes);

    //     return $result;
    // }
}
