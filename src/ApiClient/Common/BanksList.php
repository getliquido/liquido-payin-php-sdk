<?php

namespace LiquidoBrl\PayInPhpSdk\ApiClient\Common;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use LiquidoBrl\PayInPhpSdk\ApiClient\PayInClient;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;

class BanksList
{

    const BANKS_LIST_ENDPOINT = "/prod/helpers/banks?country=";
    
    protected $client = null;

    public function __construct() 
    {
        $this->client = new Client;
    }

    public function getBanksList(String $country)
    {
        $url = Config::LIQUIDO_BANKS_LIST_BASE_URL . self::BANKS_LIST_ENDPOINT . $country;
       
        $request = new Request('GET', $url);

        try {
            $response = $this->client->send($request);
            $responseBody = (string) $response->getBody();
            $responseBanksList = json_decode($responseBody, true);
            return $responseBanksList;
        } catch (\Exception $e) {
            throw new \Exception("Error while getting list of installment plans. {$e->getMessage()}");
        }
    }

}
