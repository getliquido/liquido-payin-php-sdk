<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

class RiskData
{
    private ?String $ipAddress = null;
    private ?array $customProperties = null;

    public function __construct(
        array $riskData
    ) {
        $dataObj = (object) $riskData;

        if (property_exists($dataObj, 'ipAddress')) {
            $this->ipAddress = $dataObj->ipAddress;
        }

        if (property_exists($dataObj, 'customProperties')) {
            $this->customProperties = $dataObj->customProperties;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->ipAddress != null) {
            $arrayData["ipAddress"] = $this->ipAddress;
        }

        if ($this->customProperties != null) {
            $arrayData["customProperties"] = $this->customProperties;
        }

        return $arrayData;
    }
}
