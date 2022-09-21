<?php

namespace LiquidoBrl\VirgoPhpSdk\Util;

abstract class PaymentMethod
{
    public const CREDIT_CARD = "CREDIT_CARD";
    public const PIX_STATIC_QR = "PIX_STATIC_QR";
    public const PIX_DYNAMIC_QR = "PIX_DYNAMIC_QR";
    public const BOLETO = "BOLETO";
}
