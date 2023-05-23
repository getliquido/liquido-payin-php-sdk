<?php

namespace LiquidoBrl\PayInPhpSdk\Service\Mexico;

use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CashClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CreditCardClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Mexico\BankTransfer;
use LiquidoBrl\PayInPhpSdk\Util\Mexico\PaymentMethod as PaymentMethodMexico;
use LiquidoBrl\PayInPhpSdk\Util\Common\PaymentMethod as PaymentMethodCommon;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;

class MexicoService
{
    private $payInClient = null;
    
    public function createPayIn(
        Config $configData,
        PayInRequest $payInRequest,
        String $accessToken
    ) {
        $paymentMethod = $payInRequest->getPaymentMethod();

        switch ($paymentMethod) {
            case PaymentMethodCommon::CREDIT_CARD:
                $this->payInClient = new CreditCardClient($configData, $accessToken);
                break;
            case PaymentMethodCommon::CASH:
                $this->payInClient = new CashClient($configData, $accessToken);
                break;
            case PaymentMethodMexico::BANK_TRANSFER:
                $this->payInClient = new BankTransfer($configData, $accessToken);   
                break;             
            default:
                $this->payInClient = null;
        }

        $payInResponse = $this->payInClient->createPayIn($payInRequest);
        return $payInResponse;   
    }
}