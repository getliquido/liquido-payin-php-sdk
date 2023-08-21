<?php

namespace LiquidoBrl\PayInPhpSdk\Model\Common;

class Proposal
{
    private $proposalId = null;

    public function __construct(
        $paymentProposalInfo = array()
    ) {
        $dataObj = (object) $paymentProposalInfo;

        if (property_exists($dataObj, 'proposalId')) {
            $this->proposalId = $dataObj->proposalId;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->proposalId != null) {
            $arrayData["proposalId"] = $this->proposalId;
        }

        return $arrayData;
    }
}
