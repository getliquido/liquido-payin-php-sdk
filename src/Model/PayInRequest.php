<?php

namespace LiquidoBrl\VirgoPhpSdk\Model;

class PayInRequest
{

    private String $idempotencyKey;
    private int $amount;
    private String $paymentMethod;
    private String $paymentFlow;
    private String $callbackUrl;
    private String $description;
    private object $payer;

    public function __construct(
        array $requestData
    ) {
        $dataObj = (object) $requestData;
        $this->idempotencyKey = $dataObj->idempotencyKey;
        $this->amount = $dataObj->amount;
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
