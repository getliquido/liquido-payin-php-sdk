<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Common;

use GuzzleHttp\Client;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class CreditCardClient extends PayInClient
{

    const ENDPOINT = "/v1/payments/charges/card";

    public function __construct(
        Config $configData,
        String $accessToken
    ) {
        parent::setAccessToken($accessToken);
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function createPayIn(PayInRequest $creditCardRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT;

        $payload = $creditCardRequest->toArray();
        $creditCardResponse = parent::requestPayIn($url, $payload);
        return $creditCardResponse;
    }
}
