<?php

namespace LiquidoBrl\PayInPhpSdk\Model\Common;

class Card
{

    private $cardHolderName = null;
    private $cardNumber = null;
    private $expirationMonth = null;
    private $expirationYear = null;
    private $cvc = null;

    public function __construct(
        $cardData = array()
    ) {
        $dataObj = (object) $cardData;

        if (property_exists($dataObj, 'cardHolderName')) {
            $this->cardHolderName = $dataObj->cardHolderName;
        }

        if (property_exists($dataObj, 'cardNumber')) {
            $this->cardNumber = $dataObj->cardNumber;
        }

        if (property_exists($dataObj, 'expirationMonth')) {
            $this->expirationMonth = $dataObj->expirationMonth;
        }

        if (property_exists($dataObj, 'expirationYear')) {
            $this->expirationYear = $dataObj->expirationYear;
        }

        if (property_exists($dataObj, 'cvc')) {
            $this->cvc = $dataObj->cvc;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->cardHolderName != null) {
            $arrayData["cardHolderName"] = $this->cardHolderName;
        }

        if ($this->cardNumber != null) {
            $arrayData["cardNumber"] = $this->cardNumber;
        }

        if ($this->expirationMonth != null) {
            $arrayData["expirationMonth"] = $this->expirationMonth;
        }

        if ($this->expirationYear != null) {
            $arrayData["expirationYear"] = $this->expirationYear;
        }

        if ($this->cvc != null) {
            $arrayData["cvc"] = $this->cvc;
        }

        return $arrayData;
    }
}
