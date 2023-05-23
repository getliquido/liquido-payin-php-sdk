<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Common;

use GuzzleHttp\Client;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class CashClient extends PayInClient
{
    const ENDPOINT = '/v1/payments/charges/paycash';

    public function __construct(
        Config $configData,
        String $accessToken
    )
    {
        parent::setAccessToken($accessToken);
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function createPayIn(PayInRequest $cashRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT;
        $payload = $cashRequest->toArray();
        $cashResponse = parent::requestPayIn($url, $payload);

        return $cashResponse;
    }
}