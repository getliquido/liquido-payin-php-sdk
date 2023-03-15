<?php

namespace LiquidoBrl\PayInPhpSdk\Service;

use LiquidoBrl\PayInPhpSdk\ApiClient\AuthClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\RefundRequest;
use LiquidoBrl\PayInPhpSdk\ApiClient\RefundClient;

class RefundService extends PayInService
{
    private $refundClient = null;
    private $getRefundPayment = null;

    public function createRefund(
        Config $configData,
        RefundRequest $refundRequest
    ) {
        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();

        if ($accessToken != null) {
            $this->refundClient = new RefundClient($configData, $accessToken);
            $refundResponse = $this->refundClient->createRefund($refundRequest);
            return $refundResponse;
        }
    }

    public function getRefund(
        Config $configData,
        String $idempotencyKey
    ) {
        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();

        if ($accessToken != null) {
            $this->getRefundPayment = new RefundClient($configData, $accessToken);
            $refundResponse = $this->getRefundPayment->getRefund($idempotencyKey);
            return $refundResponse;
        }
    }
}
