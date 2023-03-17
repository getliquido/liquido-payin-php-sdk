<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use \Psr\Log\LoggerInterface;

use LiquidoBrl\PayInPhpSdk\Util\Config;

class AuthClient
{

    private $configData = null;
    private $client = null;
    private LoggerInterface $logger;

    public function __construct(
        Config $configData,
        LoggerInterface $logger
    ) {
        $this->configData = $configData;
        $this->client = new Client();
        $this->logger = $logger;
    }

    public function authenticate()
    {
        $this->logger->info("**************** URL Autenticação**********", (array) $this->configData->getAuthUrl());
        $this->logger->info("**************** Client id *************", (array) $this->configData->getClientId());
        $this->logger->info("**************** Cliente secret *********", (array) $this->configData->getClientSecret());

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

            $this->logger->info("****************** Auth Response **********", (array) $authResponse);

            return $authResponse;
        } catch (\Exception $e) {
            throw new \Exception("Error while request pay in to Liquido BR API. {$e->getMessage()}");
        }
    }
}
