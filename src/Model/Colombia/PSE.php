<?php

namespace LiquidoBrl\PayInPhpSdk\Model\Colombia;

class PSE
{
    private $personType = null;
    private $financialInstitutionCode = null;

    public function __construct(
        $pseData = array()
    ) {
        $dataObj = (object) $pseData;

        if (property_exists($dataObj, 'personType')) {
            $this->personType = $dataObj->personType;
        }

        if (property_exists($dataObj, 'financialInstitutionCode')) {
            $this->financialInstitutionCode = $dataObj->financialInstitutionCode;
        } 
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->personType != null) {
            $arrayData["personType"] = $this->personType;
        }

        if ($this->financialInstitutionCode != null) {
            $arrayData["financialInstitutionCode"] = $this->financialInstitutionCode;
        }

        return $arrayData;
    }
}
