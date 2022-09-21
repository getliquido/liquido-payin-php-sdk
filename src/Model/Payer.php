<?php

namespace LiquidoBrl\VirgoPhpSdk\Model;

class Payer
{

    private String $name = "";
    private String $email = "";
    private String $phone = "";
    private object $document;
    private object $billingAddress;

    public function __construct(
        array $payerData
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
        
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
