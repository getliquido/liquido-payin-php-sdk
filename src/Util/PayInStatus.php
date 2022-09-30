<?php

namespace LiquidoBrl\PayInPhpSdk\Util;

abstract class PayInStatus
{
    const INITIAL_STATUS = 'INITIAL_STATUS';
    const SETTLED = 'SETTLED';
    const IN_PROGRESS = 'IN_PROGRESS';
    const FAILED = 'FAILED';
    const CHARGED_BACK = 'CHARGED_BACK';
    const REFUNDING = 'REFUNDING';
    const REFUNDED = 'REFUNDED';
    const EXPIRED = 'EXPIRED';
    const CANCELLED = 'CANCELLED';
}
