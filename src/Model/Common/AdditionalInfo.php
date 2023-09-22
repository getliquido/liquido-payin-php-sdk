<?php

namespace LiquidoBrl\PayInPhpSdk\Model\Common;

class AdditionalInfo
{
    private $bankTransferAccountInfo;

    public function __construct(
        $additionalInfo = array()
    ) {
        $dataObj = (object) $additionalInfo;

        if (property_exists($dataObj, 'bankTransferAccountInfo')) {
            $bankTransferAccountInfoObj = new BankTransferAccountInfo($dataObj->bankTransferAccountInfo);
            $this->bankTransferAccountInfo = $bankTransferAccountInfoObj;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->bankTransferAccountInfo != null) {
            $arrayData["bankTransferAccountInfo"] = $this->bankTransferAccountInfo->toArray();
        }

        return $arrayData;
    }
}