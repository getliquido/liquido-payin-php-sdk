<?php

namespace LiquidoBrl\PayInPhpSdk\Service;

use Exception;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\ApiClient\AuthClient;
use LiquidoBrl\PayInPhpSdk\Util\PaymentMethod;
use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\PixClient;

class PayInService
{

    private AuthClient $authClient;
    private PayInClient $payInClient;

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
                    //
                    break;
                case PaymentMethod::PIX_DYNAMIC_QR || PaymentMethod::PIX_STATIC_QR:
                    $this->payInClient = new PixClient($configData);
                    break;
                case PaymentMethod::BOLETO:
                    //
                    break;
                default:
                    return null;
            }

            try {
                $payInResponse = $this->payInClient->createPayIn($accessToken, $payInRequest);
                return $payInResponse;
            } catch (Exception $e) {
                throw new Exception('Error while creating the pay in request.');
            }
        } else {
            throw new Exception('Erro while getting the access token.');
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
        } catch (Exception $e) {
            return null;
        }
    }
}
