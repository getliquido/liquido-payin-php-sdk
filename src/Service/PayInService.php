<?php

namespace LiquidoBrl\PayInPhpSdk\Service;

use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\ApiClient\AuthClient;
use LiquidoBrl\PayInPhpSdk\Util\PaymentMethod;
use LiquidoBrl\PayInPhpSdk\ApiClient\CreditCardClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\PixClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\BoletoClient;

class PayInService
{

    private $authClient = null;
    private $payInClient = null;

    public function createPayIn(
        Config $configData,
        PayInRequest $payInRequest
    ) {

        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();

        if ($accessToken != null) {

            $paymentMethod = $payInRequest->getPaymentMethod();

            switch ($paymentMethod) {
                case PaymentMethod::CREDIT_CARD:
                    $this->payInClient = new CreditCardClient($configData, $accessToken);
                    break;
                case PaymentMethod::PIX_STATIC_QR:
                    $this->payInClient = new PixClient($configData, $accessToken);
                    break;
                case PaymentMethod::BOLETO:
                    $this->payInClient = new BoletoClient($configData, $accessToken);
                    break;
                default:
                    $this->payInClient = null;
            }

            $payInResponse = $this->payInClient->createPayIn($payInRequest);
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
