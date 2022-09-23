<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

use LiquidoBrl\PayInPhpSdk\Util\Currency;
use LiquidoBrl\PayInPhpSdk\Util\Country;

class PayInRequest
{

    private ?String $idempotencyKey = null;
    private ?int $amount = null;
    private ?String $currency = null;
    private ?String $country = null;
    private ?String $paymentMethod = null;
    private ?String $paymentFlow = null;
    private ?String $callbackUrl = null;
    private ?String $description = null;
    private ?Payer $payer = null;
    // private ?OrderInfo $orderInfo = null;
    private ?PaymentTerm $paymentTerm = null;
    private ?RiskData $riskData = null;
    private ?Card $card = null;
    private ?int $installments = null;

    public function __construct(
        array $requestData
    ) {
        $dataObj = (object) $requestData;

        $this->currency = Currency::BRL;
        $this->country = Country::BRAZIL;

        if (property_exists($dataObj, 'idempotencyKey')) {
            $this->idempotencyKey = $dataObj->idempotencyKey;
        }

        if (property_exists($dataObj, 'amount')) {
            $this->amount = $dataObj->amount;
        }

        if (property_exists($dataObj, 'paymentMethod')) {
            $this->paymentMethod = $dataObj->paymentMethod;
        }

        if (property_exists($dataObj, 'paymentFlow')) {
            $this->paymentFlow = $dataObj->paymentFlow;
        }

        if (property_exists($dataObj, 'callbackUrl')) {
            $this->callbackUrl = $dataObj->callbackUrl;
        }

        if (property_exists($dataObj, 'description')) {
            $this->description = $dataObj->description;
        }

        if (property_exists($dataObj, 'payer')) {
            $payerObj = new Payer($dataObj->payer);
            $this->payer = $payerObj;
        }

        if (property_exists($dataObj, 'paymentTerm')) {
            $paymentTermObj = new PaymentTerm($dataObj->paymentTerm);
            $this->paymentTerm = $paymentTermObj;
        }

        if (property_exists($dataObj, 'riskData')) {
            $riskDataObj = new PaymentTerm($dataObj->riskData);
            $this->riskData = $riskDataObj;
        }

        if (property_exists($dataObj, 'card')) {
            $cardObj = new Card($dataObj->card);
            $this->card = $cardObj;
        }

        if (property_exists($dataObj, 'installments')) {
            $this->installments = $dataObj->installments;
        }
    }

    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->idempotencyKey != null) {
            $arrayData["idempotencyKey"] = $this->idempotencyKey;
        }

        if ($this->amount != null) {
            $arrayData["amount"] = $this->amount;
        }

        if ($this->paymentMethod != null) {
            $arrayData["paymentMethod"] = $this->paymentMethod;
        }

        if ($this->paymentFlow != null) {
            $arrayData["paymentFlow"] = $this->paymentFlow;
        }

        if ($this->currency != null) {
            $arrayData["currency"] = $this->currency;
        }

        if ($this->country != null) {
            $arrayData["country"] = $this->country;
        }

        if ($this->callbackUrl != null) {
            $arrayData["callbackUrl"] = $this->callbackUrl;
        }

        if ($this->description != null) {
            $arrayData["description"] = $this->description;
        }

        if ($this->payer != null) {
            $arrayData["payer"] = $this->payer->toArray();
        }

        if ($this->paymentTerm != null) {
            $arrayData["paymentTerm"] = $this->paymentTerm->toArray();
        }

        if ($this->riskData != null) {
            $arrayData["riskData"] = $this->riskData->toArray();
        }

        if ($this->card != null) {
            $arrayData["card"] = $this->card->toArray();
        }

        if ($this->installments != null) {
            $arrayData["installments"] = $this->installments;
        }

        return $arrayData;
    }
}
