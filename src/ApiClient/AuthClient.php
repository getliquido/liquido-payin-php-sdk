<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\Util\Config;

class AuthClient
{

    private $configData = null;
    private $client = null;

    public function __construct(
        Config $configData
    ) {
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function authenticate()
    {
        $request = new Request('POST', $this->configData->getAuthUrl());

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    "client_id" => $this->configData->getClientId(),
                    "client_secret" => $this->configData->getClientSecret(),
                    "grant_type" => Config::GRANT_TYPE,
                ]
            ]);

            $response_body = (string) $response->getBody();

            $authResponse = json_decode($response_body);
            return $authResponse;
        } catch (\Exception $e) {
            throw new \Exception("Error while request pay in to Liquido BR API. {$e->getMessage()}");
        }
    }
}
