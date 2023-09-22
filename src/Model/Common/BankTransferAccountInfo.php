<?php

namespace LiquidoBrl\PayInPhpSdk\Model\Common;

class BankTransferAccountInfo
{
    private $bankCode;
    private $beneficiaryName;
    private $bankAccountNumber;
    private $bankAccountType;
    private $bankBranchId;
    private $ispb;
    private $document;

    public function __construct(
        $bankTransferAccountInfo = array()
    ) {
        $dataObj = (object) $bankTransferAccountInfo;

        if (property_exists($dataObj, 'bankCode')) {
            $this->bankCode = $dataObj->bankCode;
        }

        if (property_exists($dataObj, 'beneficiaryName')) {
            $this->beneficiaryName = $dataObj->beneficiaryName;
        }

        if (property_exists($dataObj, 'bankAccountNumber')) {
            $this->bankAccountNumber = $dataObj->bankAccountNumber;
        }

        if (property_exists($dataObj, 'bankAccountType')) {
            $this->bankAccountType = $dataObj->bankAccountType;
        }

        if (property_exists($dataObj, 'bankBranchId')) {
            $this->bankBranchId = $dataObj->bankBranchId;
        }

        if (property_exists($dataObj, 'ispb')) {
            $this->ispb = $dataObj->ispb;
        }

        if (property_exists($dataObj, 'document')) {
            $documentObj = new Document($dataObj->document);
            $this->document = $documentObj;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->bankCode != null) {
            $arrayData["bankCode"] = $this->bankCode;
        }

        if ($this->beneficiaryName != null) {
            $arrayData["beneficiaryName"] = $this->beneficiaryName;
        }

        if ($this->bankAccountNumber != null) {
            $arrayData["bankAccountNumber"] = $this->bankAccountNumber;
        }

        if ($this->bankAccountType != null) {
            $arrayData["bankAccountType"] = $this->bankAccountType;
        }

        if ($this->bankBranchId != null) {
            $arrayData["bankBranchId"] = $this->bankBranchId;
        }

        if ($this->ispb != null) {
            $arrayData["ispb"] = $this->ispb;
        }

        if ($this->document != null) {
            $arrayData["document"] = $this->document->toArray();
        }

        return $arrayData;
    }
}