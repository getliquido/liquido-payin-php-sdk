<?php

namespace LiquidoBrl\VirgoPhpSdk\Model;

use LiquidoBrl\VirgoPhpSdk\Util\Currency;
use LiquidoBrl\VirgoPhpSdk\Util\Country;

class PayInRequest
{

    private String $idempotencyKey;
    private int $amount;
    private String $currency;
    private String $country;
    private String $paymentMethod;
    private String $paymentFlow;
    private String $callbackUrl;
    private String $description;
    private Payer $payer;

    public function __construct(
        array $requestData
    ) {
        $dataObj = (object) $requestData;
        $this->idempotencyKey = $dataObj->idempotencyKey;
        $this->amount = $dataObj->amount;
        $this->currency = Currency::BRL;
        $this->country = Country::BRAZIL;
        $this->paymentMethod = $dataObj->paymentMethod;
        $this->paymentFlow = $dataObj->paymentFlow;
        $this->callbackUrl = $dataObj->callbackUrl;
        $this->description = $dataObj->description;

        $payerObj = new Payer($dataObj->payer);
        $this->payer = $payerObj;
    }

    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getPaymentFlow()
    {
        return $this->paymentFlow;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPayer()
    {
        return $this->payer;
    }
}
