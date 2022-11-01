<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

use LiquidoBrl\PayInPhpSdk\Model\Brazil\PaymentTerm;
use LiquidoBrl\PayInPhpSdk\Model\Colombia\PSE;
use LiquidoBrl\PayInPhpSdk\Model\Common\RiskData;
use LiquidoBrl\PayInPhpSdk\Model\Common\Payer;
use LiquidoBrl\PayInPhpSdk\Model\Common\Card;

class PayInRequest
{
    private $idempotencyKey = null;
    private $amount = null;
    private $currency = null;
    private $country = null;
    private $paymentMethod = null;
    private $paymentFlow = null;
    private $callbackUrl = null;
    private $description = null;
    private $payer = null;
    // private ?OrderInfo $orderInfo = null;
    private $paymentTerm = null;
    private $riskData = null;
    private $card = null;
    private $installments = null;
    private $pse = null;

    public function __construct(
        $requestData = array()
    ) {
        $dataObj = (object) $requestData;

        if (property_exists($dataObj, 'currency')) {
            $this->currency = $dataObj->currency;
        }

        if (property_exists($dataObj, 'country')) {
            $this->country = $dataObj->country;
        }

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
            $riskDataObj = new RiskData($dataObj->riskData);
            $this->riskData = $riskDataObj;
        }

        if (property_exists($dataObj, 'card')) {
            $cardObj = new Card($dataObj->card);
            $this->card = $cardObj;
        }

        if (property_exists($dataObj, 'installments')) {
            $this->installments = $dataObj->installments;
        }
        
        if (property_exists($dataObj, 'pse')) {
            $pseObj = new PSE($dataObj->pse);
            $this->pse = $pseObj;
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

    public function getCountry()
    {
        return $this->country;
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

        if ($this->pse != null) {
            $arrayData["pse"] = $this->pse->toArray();
        }

        return $arrayData;
    }
}
