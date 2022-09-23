<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

class PaymentTerm
{
    private String $paymentDeadline;

    public function __construct(
        array $paymentTermData
    ) {
        $dataObj = (object) $paymentTermData;

        if (property_exists($dataObj, 'paymentDeadline')) {
            $this->paymentDeadline = $dataObj->paymentDeadline;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->paymentDeadline != null) {
            $arrayData["paymentDeadline"] = $this->paymentDeadline;
        }

        return $arrayData;
    }
}
