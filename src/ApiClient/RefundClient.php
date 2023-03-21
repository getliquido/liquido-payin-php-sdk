<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\Model\RefundRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;

class RefundClient
{
    protected $configData = null;
    protected $client = null;
    protected $accessToken = null;

    const ENDPOINT = "/v1/payments/charges/refund";

    public function __construct(
        Config $configData,
        String $accessToken
    ) {
        $this->setAccessToken($accessToken);
        $this->configData = $configData;
        $this->client = new Client();
    }

    public function createRefund(RefundRequest $refundRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT;

        $payload = $refundRequest->toArray();
        $refundResponse = $this->requestRefund($url, $payload);
        return $refundResponse;
    }

    public function getRefund(String $idempotencyKey) 
    {
        $url = $this->configData->getPayInBaseUrl() . self::ENDPOINT . '/' . $idempotencyKey;
        $retrieveRefundResponse = $this->retrieveRefund($url);
        return $retrieveRefundResponse;
    }

    protected function setAccessToken(String $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    protected function requestRefund(String $url, array $payload)
    {
        $request = new Request('POST', $url);

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-api-key' => $this->configData->getClientApiKey(),
                    'Authorization' => "Bearer " . $this->accessToken
                ],
                'json' => $payload
            ]);

            $responseBody = (string) $response->getBody();
            $refundResponse = json_decode($responseBody);
            return $refundResponse;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody());
            return $responseBody;
        }
    }

    protected function retrieveRefund(String $url)
    {
        $request = new Request('GET', $url);

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-api-key' => $this->configData->getClientApiKey(),
                    'Authorization' => "Bearer " . $this->accessToken
                ]
            ]);

            $responseBody = (string) $response->getBody();
            $retrieveRefundResponse = json_decode($responseBody);
            return $retrieveRefundResponse;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody());
            return $responseBody;
        }
    }

    
}

?>