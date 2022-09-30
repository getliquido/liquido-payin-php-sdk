<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

class Payer
{

    private $name = null;
    private $email = null;
    private $phone = null;
    private $document = null;
    private $billingAddress = null;

    public function __construct(
        $payerData = array()
    ) {
        $dataObj = (object) $payerData;

        if (property_exists($dataObj, 'name')) {
            $this->name = $dataObj->name;
        }

        if (property_exists($dataObj, 'email')) {
            $this->email = $dataObj->email;
        }

        if (property_exists($dataObj, 'phone')) {
            $this->phone = $dataObj->phone;
        }

        if (property_exists($dataObj, 'document')) {
            $docObj = new Document($dataObj->document);
            $this->document = $docObj;
        }

        if (property_exists($dataObj, 'billingAddress')) {
            $billingAddressObj = new BillingAddress($dataObj->billingAddress);
            $this->billingAddress = $billingAddressObj;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->name != null) {
            $arrayData["name"] = $this->name;
        }

        if ($this->email != null) {
            $arrayData["email"] = $this->email;
        }

        if ($this->phone != null) {
            $arrayData["phone"] = $this->phone;
        }

        if ($this->document != null) {
            $arrayData["document"] = $this->document->toArray();
        }

        if ($this->billingAddress != null) {
            $arrayData["billingAddress"] = $this->billingAddress->toArray();
        }

        return $arrayData;
    }
}
