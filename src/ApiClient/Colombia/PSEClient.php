<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Colombia;

use GuzzleHttp\Client;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class PSEClient extends PayInClient
{
    const ENDPOINT = '/v1/payments/charges/pse';

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
}