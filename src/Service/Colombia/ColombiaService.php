<?php

namespace LiquidoBrl\PayInPhpSdk\Service\Colombia;

use LiquidoBrl\PayInPhpSdk\ApiClient\Colombia\PSEClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CashClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CreditCardClient;
use LiquidoBrl\PayInPhpSdk\Util\Colombia\PaymentMethod as PaymentMethodColombia;
use LiquidoBrl\PayInPhpSdk\Util\Common\PaymentMethod as PaymentMethodCommon;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;


class ColombiaService
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
            case PaymentMethodColombia::PSE:
                $this->payInClient = new PSEClient($configData, $accessToken);   
                break;             
            default:
                $this->payInClient = null;
        }

        $payInResponse = $this->payInClient->createPayIn($payInRequest);
        return $payInResponse;   
    }

    public function getPseFinancialInstitutions(
        Config $configData,
        String $accessToken
    ) {
        $this->payInClient = new PSEClient($configData, $accessToken);
        $listOfBanks = $this->payInClient->getPseFinancialInstitutions();
        return $listOfBanks;
    }
}