<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Mexico;

use GuzzleHttp\Client;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class BankTransfer extends PayInClient
{
    const ENDPOINT = '/v1/payments/charges/bank_transfer';

    public function __construct(
        Config $configData,
        String $accessToken
    )
    {
        parent::setAccessToken($accessToken);
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function createPayIn(PayInRequest $bankTransferRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT;
        $payload = $bankTransferRequest->toArray();
        $bankTransferResponse = parent::requestPayIn($url, $payload);

        return $bankTransferResponse;
    }
}