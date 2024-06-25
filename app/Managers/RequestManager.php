<?php

namespace App\Managers;

use App\Models\Transaction\Result;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class RequestManager
{
    const APPLICATION_JSON = 'application/json';
    const NO_SSL_VERIFICATION = ['local', 'testing'];
    const ALLOWED_METHODS = ['GET', 'POST', 'PUT'];

    public static function headers(array $append = []): array
    {
        $headers = [
            'Authorization' => env('ENGAGEBAY_KEY'),
            'Accept' => self::APPLICATION_JSON,
        ];

        return ($append == []) ? $headers : array_merge($headers, $append);
    }

    public static function verifySSL(): bool
    {
        return in_array(env('APP_ENV'), self::NO_SSL_VERIFICATION) ? false : true;
    }

    public static function request(string $method, string $uri, array $headers, array $data2send = [], bool $bodySend = false): Result
    {
        Log::debug(__METHOD__, compact('uri', 'data2send', 'headers', 'bodySend'));

        $method = strtoupper($method);

        if (!in_array($method, self::ALLOWED_METHODS)) throw new Exception("Unknow method request `$method`");

        try {
            $options = [
                'verify' => self::verifySSL(),
                'headers' => $headers,
            ];

            if ($method != Request::METHOD_GET && !empty($data2send)) {
                if ($bodySend) {
                    $options['body'] = json_encode($data2send);
                } else {
                    $options['json'] = $data2send;
                }
            }

            Log::debug('Options used', $options);

            $client = new Client();
            $response = null;
            if ($method == Request::METHOD_POST) {
                $response = $client->post($uri, $options);
            } elseif ($method == Request::METHOD_PUT) {
                $response = $client->put($uri, $options);
            } elseif($method == Request::METHOD_DELETE) {
                $response = $client->delete($uri, $options);
            } else {
                $response = $client->get($uri, $options);
            }

            if ($response->getStatusCode() != 200) {
                $message = sprintf('Unable to perform a %s Request on `%s`: %s', $method, $uri, $response->getReasonPhrase());
                Log::critical($message, ['status_code' => $response->getStatusCode()]);

                return new Result(
                    Result::ERROR,
                    $message,
                    [
                        'status_code' => $response->getStatusCode(),
                    ]
                );
            }

            Log::debug(sprintf('%s Request on `%s` successfully', $method, $uri));

            $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            Log::debug('Successful ' . $method . ' operation', [
                'data' => $data
            ]);

            return new Result(
                Result::DONE,
                $method . ' request successful',
                $data
            );
        } catch (ClientException $ex) {
            Log::warning($ex->getMessage(), [
                'code' => $ex->getCode(),
                'message' => $ex->getMessage(),
                'file' => $ex->getFile(),
                'line' => $ex->getLine(),
                'response' => (string)$ex->getResponse()->getBody(),
            ]);

            return new Result(
                Result::FAILED,
                $ex->getMessage()
            );
        } catch (BadResponseException $ex) {
            Log::error($ex->getMessage(), [
                'code' => $ex->getCode(),
                'message' => $ex->getMessage(),
                'file' => $ex->getFile(),
                'line' => $ex->getLine(),
                'response' => (string)$ex->getResponse()->getBody(),
            ]);

            return new Result(
                Result::FAILED,
                $ex->getMessage()
            );
        } catch (Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode(),
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
                'response' => null,
            ]);

            return new Result(
                Result::ERROR,
                $th->getMessage()
            );
        }
    }

    public static function get(string $uri, array $headers): Result
    {
        Log::debug(__METHOD__, compact('uri', 'headers'));

        return self::request(Request::METHOD_GET, $uri, $headers);
    }

    public static function post(string $uri, array $data2send, array $headers, bool $bodySend = false): Result
    {
        Log::debug(__METHOD__, compact('uri', 'data2send', 'headers', 'bodySend'));

        return self::request(Request::METHOD_POST, $uri, $headers, $data2send, $bodySend);
    }

    public static function put(string $uri, array $data2send, array $headers, bool $bodySend = false): Result
    {
        Log::debug(__METHOD__, compact('uri', 'data2send', 'headers', 'bodySend'));

        return self::request(Request::METHOD_PUT, $uri, $headers, $data2send, $bodySend);
    }

    public static function delete(string $uri, array $data2send, array $headers, bool $bodySend = false): Result
    {
        Log::debug(__METHOD__, compact('uri', 'data2send', 'headers', 'bodySend'));

        return self::request(Request::METHOD_DELETE, $uri, $headers, $data2send, $bodySend);
    }
}
