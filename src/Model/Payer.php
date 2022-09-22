<?php

namespace LiquidoBrl\VirgoPhpSdk\Model;

class Payer
{

    private String $name = "";
    private String $email = "";
    private String $phone = "";
    private Document $document;
    private BillingAddress $billingAddress;

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

        if (property_exists($dataObj, 'document')) {
            $docObj = new Document($dataObj->document);
            $this->document = $docObj;
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

    public function getDocument()
    {
        return $this->document;
    }

    public function getBillingAddress()
    {
        return $this->billingAddress;
    }
}
