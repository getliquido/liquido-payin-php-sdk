<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

class BillingAddress
{

    private String $zipCode = "";
    private String $state = "";
    private String $city = "";
    private String $district = "";
    private String $street = "";
    private String $number = "";
    private String $complement = "";
    private String $country = "";

    public function __construct(
        array $billingAddressData
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

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function getCountry()
    {
        return $this->country;
    }
}
