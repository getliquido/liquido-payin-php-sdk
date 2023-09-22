<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

use LiquidoBrl\PayInPhpSdk\Model\Common\AdditionalInfo;

class RefundRequest
{
    private $idempotencyKey = null;
    private $referenceId = null;
    private $amount = null;
    private $currency = null;
    private $country = null;
    private $description = null;
    private $callbackUrl = null;
    private $additionalInfo = null;

    public function __construct(
        $requestData = array()
    ) {
        $dataObj = (object) $requestData;

        if (property_exists($dataObj, 'idempotencyKey')) {
            $this->idempotencyKey = $dataObj->idempotencyKey;
        }

        if (property_exists($dataObj, 'referenceId')) {
            $this->referenceId = $dataObj->referenceId;
        }

        if (property_exists($dataObj, 'amount')) {
            $this->amount = $dataObj->amount;
        }

        if (property_exists($dataObj, 'currency')) {
            $this->currency = $dataObj->currency;
        }

        if (property_exists($dataObj, 'country')) {
            $this->country = $dataObj->country;
        }

        if (property_exists($dataObj, 'description')) {
            $this->description = $dataObj->description;
        }

        if (property_exists($dataObj, 'callbackUrl')) {
            $this->callbackUrl = $dataObj->callbackUrl;
        }

        if (property_exists($dataObj, 'additionalInfo')) {
            $additionalInfoObj = new AdditionalInfo($dataObj->additionalInfo);
            $this->additionalInfo = $additionalInfoObj;
        }
    }

    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
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

        if ($this->referenceId != null) {
            $arrayData["referenceId"] = $this->referenceId;
        }

        if ($this->amount != null) {
            $arrayData["amount"] = $this->amount;
        }

        if ($this->currency != null) {
            $arrayData["currency"] = $this->currency;
        }

        if ($this->country != null) {
            $arrayData["country"] = $this->country;
        }

        if ($this->description != null) {
            $arrayData["description"] = $this->description;
        }

        if ($this->callbackUrl != null) {
            $arrayData["callbackUrl"] = $this->callbackUrl;
        }

        if ($this->additionalInfo != null) {
            $arrayData["additionalInfo"] = $this->additionalInfo->toArray();
        }

        return $arrayData;
    }
}
