<?php

namespace LiquidoBrl\PayInPhpSdk\Service;

use LiquidoBrl\PayInPhpSdk\ApiClient\AuthClient;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Util\Country;
use LiquidoBrl\PayInPhpSdk\Service\Brazil\BrazilService;
use LiquidoBrl\PayInPhpSdk\Service\Colombia\ColombiaService;

class PayInService
{

    private $authClient = null;
    private $payInService = null;

    public function createPayIn(
        Config $configData,
        PayInRequest $payInRequest
    ) {
        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();

        if ($accessToken != null) {

            switch ($payInRequest->getCountry()) {
                case Country::BRAZIL:
                    $this->payInService = new BrazilService;
                    break;
                case Country::COLOMBIA:
                    $this->payInService = new ColombiaService;
                    break;
                default:
                    $this->payInService = null;
            }

            $payInResponse = $this->payInService->createPayIn($configData, $payInRequest, $accessToken);
            return $payInResponse;
        }
    }

    private function getAccessToken()
    {
        try {
            $authResponse = $this->authClient->authenticate();
            if (property_exists($authResponse, 'access_token')) {
                return $authResponse->access_token;
            }
            return null;
        } catch (\Exception $e) {
            throw new \Exception("Error while getting the access token. {$e->getMessage()}");
        }
    }
}
