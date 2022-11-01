<?php

namespace LiquidoBrl\PayInPhpSdk\Model\Common;

class BillingAddress
{

    private $zipCode = null;
    private $state = null;
    private $city = null;
    private $district = null;
    private $street = null;
    private $number = null;
    private $complement = null;
    private $country = null;

    public function __construct(
        $billingAddressData = array()
    ) {
        $dataObj = (object) $billingAddressData;

        if (property_exists($dataObj, 'zipCode')) {
            $this->zipCode = $dataObj->zipCode;
        }

        if (property_exists($dataObj, 'state')) {
            $this->state = $dataObj->state;
        }

        if (property_exists($dataObj, 'city')) {
            $this->city = $dataObj->city;
        }

        if (property_exists($dataObj, 'district')) {
            $this->district = $dataObj->district;
        }

        if (property_exists($dataObj, 'street')) {
            $this->street = $dataObj->street;
        }

        if (property_exists($dataObj, 'number')) {
            $this->number = $dataObj->number;
        }

        if (property_exists($dataObj, 'complement')) {
            $this->complement = $dataObj->complement;
        }

        if (property_exists($dataObj, 'country')) {
            $this->country = $dataObj->country;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->zipCode != null) {
            $arrayData["zipCode"] = $this->zipCode;
        }

        if ($this->state != null) {
            $arrayData["state"] = $this->state;
        }

        if ($this->city != null) {
            $arrayData["city"] = $this->city;
        }

        if ($this->district != null) {
            $arrayData["district"] = $this->district;
        }

        if ($this->street != null) {
            $arrayData["street"] = $this->street;
        }

        if ($this->number != null) {
            $arrayData["number"] = $this->number;
        }

        if ($this->complement != null) {
            $arrayData["complement"] = $this->complement;
        }

        if ($this->country != null) {
            $arrayData["country"] = $this->country;
        }

        return $arrayData;
    }
}
