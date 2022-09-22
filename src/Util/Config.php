<?php

namespace LiquidoBrl\VirgoPhpSdk\Util;

class Config
{
    private const LIQUIDO_SANDBOX_AUTH_URL = "https://auth-dev.liquido.com/oauth2/token";
    private const LIQUIDO_SANDBOX_VIRGO_BASE_URL = "https://api-qa.liquido.com";

    private const LIQUIDO_PRODUCTION_AUTH_URL = "https://authsg.liquido.com/oauth2/token";
    private const LIQUIDO_PRODUCTION_VIRGO_BASE_URL = "https://api.liquido.com";

    public const CURRENCY = "BRL";
    public const COUNTRY = "BR";

    private String $clientId = "";
    private String $clientSecret = "";
    private String $apiKey = "";
    private bool $liveMode = false;

    public function __construct(
        array $configData,
        bool $liveMode = false
    ) {
        $dataObj = (object) $configData;
        if (property_exists($dataObj, 'clientId')) {
            $this->clientId = $dataObj->clientId;
        }

        if (property_exists($dataObj, 'clientSecret')) {
            $this->clientSecret = $dataObj->clientSecret;
        }

        if (property_exists($dataObj, 'apiKey')) {
            $this->apiKey = $dataObj->apiKey;
        }

        $this->liveMode = $liveMode;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getClientApiKey()
    {
        return $this->apiKey;
    }

    public function isLiveMode()
    {
        return $this->liveMode;
    }
}
