<?php

namespace LiquidoBrl\PayInPhpSdk\Service\Brazil;

use LiquidoBrl\PayInPhpSdk\ApiClient\Brazil\BoletoClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Brazil\PixClient;
use LiquidoBrl\PayInPhpSdk\ApiClient\Common\CreditCardClient;
use LiquidoBrl\PayInPhpSdk\Util\Brazil\PaymentMethod as PaymentMethodBrazil;
use LiquidoBrl\PayInPhpSdk\Util\Common\PaymentMethod as PaymentMethodCommon;
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
            case PaymentMethodCommon::CREDIT_CARD:
                $this->payInClient = new CreditCardClient($configData, $accessToken);
                break;
            case PaymentMethodBrazil::PIX_STATIC_QR:
                $this->payInClient = new PixClient($configData, $accessToken);
                break;
            case PaymentMethodBrazil::BOLETO:
                $this->payInClient = new BoletoClient($configData, $accessToken);
                break;
            default:
                $this->payInClient = null;
        }

        $payInResponse = $this->payInClient->createPayIn($payInRequest);
        return $payInResponse;
    }
}