<?php

namespace LiquidoBrl\PayInPhpSdk\Service\Brazil;

use LiquidoBrl\PayInPhpSdk\ApiClient\Brazil\BoletoClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Brazil\PixClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CreditCardClient;
use LiquidoBrl\PayInPhpSdk\Util\Brazil\PaymentMethod;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;


class BrazilService
{

    private $payInClient = null;

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