<?php

namespace LiquidoBrl\PayInPhpSdk\Util;

abstract class PaymentMethod
{
    const CREDIT_CARD = "CREDIT_CARD";
    const PIX_STATIC_QR = "PIX_STATIC_QR";
    const PIX_DYNAMIC_QR = "PIX_DYNAMIC_QR";
    const BOLETO = "BOLETO";
    const PSE = "PSE";
    const CASH = "CASH";
}
