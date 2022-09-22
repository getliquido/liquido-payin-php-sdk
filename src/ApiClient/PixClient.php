<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient;

use GuzzleHttp\Client;

use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class PixClient extends PayInClient
{
    private const ENDPOINT = "/v1/payments/charges/pix";

    public function __construct(
        Config $configData
    ) {
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function createPayIn(String $accessToken, PayInRequest $pixRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT;

        $payload = $pixRequest->toArray();
        parent::setAccessToken($accessToken);
        $pixResponse = parent::requestPayIn($url, $payload);
        return $pixResponse;
    }
}
