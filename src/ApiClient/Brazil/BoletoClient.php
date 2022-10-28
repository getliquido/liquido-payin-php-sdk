<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Brazil;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class BoletoClient extends PayInClient
{

    const ENDPOINT = "/v1/payments/charges/boleto";
    const PDF_ENDPOINT = "/v1/payments/files/boleto/pdf";

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

        $boletoUrl = $this->getBoletoPdfUrl($boletoResponse->idempotencyKey);
        $boletoResponse->{"boletoUrl"} = $boletoUrl;

        return $boletoResponse;
    }

    private function getBoletoPdfUrl(String $idempotencyKey)
    {
        $url = $this->configData->getPayInBaseUrl() . self::PDF_ENDPOINT . "/" . $idempotencyKey;
        $request = new Request('GET', $url);

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'x-api-key' => $this->configData->getClientApiKey(),
                    'Authorization' => $this->accessToken
                ]
            ]);

            $responseBody = (string) $response->getBody();
            return $responseBody;
        } catch (\Exception $e) {
            throw new \Exception("Error while getting Boleto PDF. {$e->getMessage()}");
        }
    }
}
