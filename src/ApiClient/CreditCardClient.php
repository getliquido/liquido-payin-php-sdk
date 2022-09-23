<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient;

use GuzzleHttp\Client;

use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class CreditCardClient extends PayInClient
{

    private const ENDPOINT = "/v1/payments/charges/card";

    public function __construct(
        Config $configData,
        String $accessToken
    ) {
        parent::setAccessToken($accessToken);
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function createPayIn(PayInRequest $boletoRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT;

        $payload = $boletoRequest->toArray();
        $boletoResponse = parent::requestPayIn($url, $payload);
        return $boletoResponse;
    }
}
