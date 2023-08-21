<?php

namespace LiquidoBrl\PayInPhpSdk\Service\Common;

use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CreditCardClient;
use LiquidoBrl\PayInPhpSdk\Util\Common\PaymentMethod as PaymentMethod;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;


class CommonService
{
    private $payInClient = null;

    public function createPayIn(
        Config $configData,
        PayInRequest $payInRequest,
        String $accessToken
    ) {
        //$paymentMethod = $payInRequest->getPaymentMethod();

        $this->payInClient = new CreditCardClient($configData, $accessToken);
        $payInResponse = $this->payInClient->createPayIn($payInRequest);
        return $payInResponse;   
    }

    public function getInstallmentPlans(
        Config $configData,
        String $accessToken,
        String $planId = null
    ) {
        $this->payInClient = new CreditCardClient($configData, $accessToken);
        $plansResponse = $this->payInClient->getInstallmentPlans($planId);
        return $plansResponse;
    }

    public function createProposal(
        Config $configData, 
        PayInRequest $payInRequest,
        String $accessToken
    ) {
        $this->payInClient = new CreditCardClient($configData, $accessToken);
        $proposalResponse = $this->payInClient->createProposal($payInRequest);
        return $proposalResponse;
    }
}