<?php

namespace LiquidoBrl\VirgoPhpSdk\Service;

use LiquidoBrl\VirgoPhpSdk\Util\Config;
use LiquidoBrl\VirgoPhpSdk\Model\PayInRequest;

class PayInService
{

    public function createPayIn(
        Config $config,
        PayInRequest $payInRequest
    ) {
        return "clientId: {$config->getClientId()}, payer email: {$payInRequest->getPayer()->getEmail()}";
    }
}
