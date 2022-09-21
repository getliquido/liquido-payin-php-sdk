<?php

namespace LiquidoBrl\VirgoPhpSdk\Util;

abstract class PayInStatus
{
    public const INITIAL_STATUS = 'INITIAL_STATUS';
    public const SETTLED = 'SETTLED';
    public const IN_PROGRESS = 'IN_PROGRESS';
    public const FAILED = 'FAILED';
    public const CHARGED_BACK = 'CHARGED_BACK';
    public const REFUNDING = 'REFUNDING';
    public const REFUNDED = 'REFUNDED';
    public const EXPIRED = 'EXPIRED';
    public const CANCELLED = 'CANCELLED';
}
