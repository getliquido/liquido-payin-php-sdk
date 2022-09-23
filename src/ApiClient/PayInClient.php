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
    protected String $accessToken;

    abstract public function createPayIn(PayInRequest $payInRequest);

    protected function setAccessToken(String $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    protected function requestPayIn(String $url, array $payload)
    {
        $request = new Request('POST', $url);

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-api-key' => $this->configData->getClientApiKey(),
                    'Authorization' => $this->accessToken
                ],
                'json' => $payload
            ]);

            $responseBody = (string) $response->getBody();
            $payInResponse = json_decode($responseBody);
            return $payInResponse;
        } catch (\Exception $e) {
            throw new \Exception("Error while request pay in to Liquido BR API. {$e->getMessage()}");
        }
    }
}
