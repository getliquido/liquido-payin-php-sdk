<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

use LiquidoBrl\PayInPhpSdk\Util\Currency;
use LiquidoBrl\PayInPhpSdk\Util\Country;

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

    public function toArray()
    {
        $requestArray = [
            "idempotencyKey" => $this->idempotencyKey,
            "amount" => $this->amount,
            "currency" => $this->currency,
            "country" => $this->country,
            "paymentMethod" => $this->paymentMethod,
            "paymentFlow" => $this->paymentFlow,
            "callbackUrl" => $this->callbackUrl,
            "payer" => [
                "email" => $this->payer->getEmail()
            ],
            "description" => $this->description
        ];
        return $requestArray;
    }
}
