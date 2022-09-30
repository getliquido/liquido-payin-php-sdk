<?php

namespace LiquidoBrl\PayInPhpSdk\Util;

class Config
{
    const LIQUIDO_SANDBOX_AUTH_URL = "https://auth-dev.liquido.com/oauth2/token";
    const LIQUIDO_SANDBOX_PAYIN_BASE_URL = "https://api-qa.liquido.com";

    const LIQUIDO_PRODUCTION_AUTH_URL = "https://authsg.liquido.com/oauth2/token";
    const LIQUIDO_PRODUCTION_PAYIN_BASE_URL = "https://api.liquido.com";

    const GRANT_TYPE = "client_credentials";
    
    private $clientId = "";
    private $clientSecret = "";
    private $apiKey = "";
    private $isLiveMode = false;

    public function __construct(
        $configData = array(),
        $isLiveMode = false
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

        $this->isLiveMode = $isLiveMode;
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

    public function getAuthUrl()
    {
        if ($this->isLiveMode) {
            return self::LIQUIDO_PRODUCTION_AUTH_URL;
        }
        return self::LIQUIDO_SANDBOX_AUTH_URL;
    }

    public function getPayInBaseUrl()
    {
        if ($this->isLiveMode) {
            return self::LIQUIDO_PRODUCTION_PAYIN_BASE_URL;
        }
        return self::LIQUIDO_SANDBOX_PAYIN_BASE_URL;
    }
}
