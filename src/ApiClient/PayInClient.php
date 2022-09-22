<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

abstract class PayInClient
{

    protected Config $configData;
    protected Client $client;
    private String $accessToken;
    // private LoggerInterface $logger;

    abstract public function createPayIn(String $accessToken, PayInRequest $payInRequest);

    protected function setAccessToken(String $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    protected function requestPayIn(String $url, array $payload)
    {
        $request = new Request('POST', $url);
        // $className = static::class;
        // $this->logger->info("[ {$className} ]: Url: {$url} - REQUEST payload:", $this->formData);

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-api-key' => $this->configData->getClientApiKey(),
                    'Authorization' => $this->accessToken
                ],
                'json' => $payload
            ]);

            $response_body = (string) $response->getBody();

            $payInResponse = json_decode($response_body);
            // $this->logger->info("[ {$className} ]: RESPONSE payload:", (array) $authResponse);
            return $payInResponse;
        } catch (\Exception $e) {
            // $this->logger->error("[ {$className} ]: Error while request Liquido Access Token");
            // $this->logger->error($e->getMessage());
            return null;
        }
    }
}
