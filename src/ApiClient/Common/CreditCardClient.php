<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Common;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class CreditCardClient extends PayInClient
{

    const ENDPOINT = "/v1/payments/charges/card";
    const PLANS_ENDPOINT = "/v1/payments/plans";
    const PROPOSAL_ENDPOINT = "/v1/payments/proposals";

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

    public function getInstallmentPlans(String $planId = null)
    {
        $url = $this->configData->getPayInBaseUrl() . self::PLANS_ENDPOINT;
        if ($planId != null)
        {
            $url = $this->configData->getPayInBaseUrl() . self::PLANS_ENDPOINT . "/" . $planId;
        }
        $request = new Request('GET', $url);

        try {

            $response = $this->client->send($request, [
                'headers' => [
                    'x-api-key' => $this->configData->getClientApiKey(),
                    'Authorization' => "Bearer " . $this->accessToken
                ]
            ]);

            $responseBody = (string) $response->getBody();
            $responsePlans = json_decode($responseBody);
            return $responsePlans;
        } catch (\Exception $e) {
            throw new \Exception("Error while getting list of installment plans. {$e->getMessage()}");
        }
    }

    public function createProposal(PayInRequest $proposalRequest)
    {
        $url = $this->configData->getPayInBaseUrl() . self::PROPOSAL_ENDPOINT;
        $payload = $proposalRequest->toArray();
        $proposalResponse = parent::requestPayIn($url, $payload);
        return $proposalResponse;
    }
}
