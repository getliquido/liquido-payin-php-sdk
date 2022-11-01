<?php

namespace LiquidoBrl\PayInPhpSdk\Service\Colombia;

use LiquidoBrl\PayInPhpSdk\ApiClient\Colombia\CashClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Colombia\PSEClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CreditCardClient;
use LiquidoBrl\PayInPhpSdk\Util\Colombia\PaymentMethod;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;


class ColombiaService
{
    public function createPayIn(
        Config $configData,
        PayInRequest $payInRequest,
        String $accessToken
    ) {
        $paymentMethod = $payInRequest->getPaymentMethod();

        switch ($paymentMethod) {
            case PaymentMethod::CREDIT_CARD:
                $this->payInClient = new CreditCardClient($configData, $accessToken);
                break;
            case PaymentMethod::CASH:
                $this->payInClient = new CashClient($configData, $accessToken);
                break;
            case PaymentMethod::PSE:
                $this->payInClient = new PSEClient($configData, $accessToken);   
                break;             
            default:
                $this->payInClient = null;
        }

        $payInResponse = $this->payInClient->createPayIn($payInRequest);
        return $payInResponse;   
    }
}