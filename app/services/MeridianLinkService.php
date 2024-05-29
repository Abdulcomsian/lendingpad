<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MeridianLinkService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('MERIDIANLINK_API_BASE_URI'),
            'headers' => [
                'Authorization' => 'Base aWRlYWxsZW5kaW5nOnkxODMyMzdvIw==',
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function checkData($endpoint, $parameters = [])
    {
        try {
            $response = $this->client->request('POST', $endpoint, [
                'query' => $parameters
            ]);

            dd($response);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
