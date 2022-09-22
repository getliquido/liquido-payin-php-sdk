<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\Util\Config;

class AuthClient
{

    private Config $configData;
    private Client $client;
    // private LoggerInterface $logger;

    public function __construct(
        Config $configData
    ) {
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function authenticate()
    {
        // Prepare Request
        $request = new Request('POST', $this->configData->getAuthUrl());

        // $className = static::class;
        // $this->logger->info("[ {$className} ]: Url: {$url} - REQUEST payload:", $this->formData);

        try {

            // Send Request
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

            // Read Response
            $response_body = (string) $response->getBody();

            $authResponse = json_decode($response_body);
            // $this->logger->info("[ {$className} ]: RESPONSE payload:", (array) $authResponse);
            return $authResponse;
        } catch (\Exception $e) {
            // $this->logger->error("[ {$className} ]: Error while request Liquido Access Token");
            // $this->logger->error($e->getMessage());
            return null;
        }
    }
}
