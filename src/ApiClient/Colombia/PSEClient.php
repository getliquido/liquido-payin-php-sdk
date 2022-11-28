<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Colombia;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class PSEClient extends PayInClient
{
    const ENDPOINT = '/v1/payments/charges/pse';
    const BANKS_ENDPOINT = '/v1/payments/charges/pse/banks';

    public function __construct(
        Config $configData,
        String $accessToken
    )
    {
        parent::setAccessToken($accessToken);
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function createPayIn(PayInRequest $pseRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT;
        $payload = $pseRequest->toArray();
        $pseResponse = parent::requestPayIn($url, $payload);

        return $pseResponse;
    }

    public function getPseFinancialInstitutions() {
        $url = $this->configData->getPayInBaseUrl() . self::BANKS_ENDPOINT;
        $request = new Request('GET', $url);

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'x-api-key' => $this->configData->getClientApiKey(),
                    'Authorization' => $this->accessToken
                ]
            ]);

            $responseBody = (string) $response->getBody();
            $responseBanks = json_decode($responseBody);
            return $responseBanks;
        } catch (\Exception $e) {
            throw new \Exception("Error while getting PSE list of banks. {$e->getMessage()}");
        }
    }
}