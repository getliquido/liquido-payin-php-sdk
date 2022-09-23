# Liquido PayIn PHP SDK

This is a library for PHP applications to easily connect with Liquido BR PayIn API.

## Installing

You can add this in your `composer.json` file to download this library as a dependency. Ex:

```
"require": {
    "liquido-brl/payin-php-sdk": "0.0.1"
},
```

## Using:

All you need to do now is using the `PHP` classes as the example bellow:

```
use \LiquidoBrl\PayInPhpSdk\Util\Config;
use \LiquidoBrl\PayInPhpSdk\Util\PaymentMethod;
use \LiquidoBrl\PayInPhpSdk\Util\PaymentFlow;
use \LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use \LiquidoBrl\PayInPhpSdk\Service\PayInService;

...

$isLiveMode = false;

$config = new Config(
    [
        'clientId' => "your client id",
        'clientSecret' => "your client secret",
        'apiKey' => "your api key"
    ],
    $isLiveMode
);

$payInRequest = new PayInRequest([
    "idempotencyKey" => "your idempotency key",
    "amount" => 100,
    "paymentMethod" => PaymentMethod::PIX_STATIC_QR,
    "paymentFlow" => PaymentFlow::DIRECT,
    "callbackUrl" => "your callback url",
    "payer" => [
        "email" => "your customer email"
    ],
    "description" => "Product A",
    ...
]);

$payIndResponse = new PayInService()->createPayIn($config, $payInRequest);
```