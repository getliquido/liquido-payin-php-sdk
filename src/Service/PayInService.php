<?php

namespace LiquidoBrl\PayInPhpSdk\Service;

use LiquidoBrl\PayInPhpSdk\ApiClient\AuthClient;
use LiquidoBrl\PayInPhpSdk\Model\PayInRequest;
use LiquidoBrl\PayInPhpSdk\Util\Config;
use LiquidoBrl\PayInPhpSdk\Util\Country;
use LiquidoBrl\PayInPhpSdk\Service\Brazil\BrazilService;
use LiquidoBrl\PayInPhpSdk\Service\Colombia\ColombiaService;
use LiquidoBrl\PayInPhpSdk\Service\Common\CommonService;
use LiquidoBrl\PayInPhpSdk\Service\Mexico\MexicoService;

class PayInService
{

    protected $authClient = null;
    private $payInService = null;

    private function instantiatePayInService(PayInRequest $payInRequest)
    {
        switch ($payInRequest->getCountry()) {
            case Country::BRAZIL:
                $this->payInService = new BrazilService;
                break;
            case Country::COLOMBIA:
                $this->payInService = new ColombiaService;
                break;
            case Country::MEXICO:
                $this->payInService = new MexicoService;
                break;
        }
    }

    public function createPayIn(
        Config $configData,
        PayInRequest $payInRequest
    ) {
        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();

        if ($accessToken != null) {

            $this->instantiatePayInService($payInRequest);

            $payInResponse = $this->payInService->createPayIn($configData, $payInRequest, $accessToken);
            return $payInResponse;
        }
    }

    // To do: create public function to get boleto PDF.
   /*  public function getBoletoPdf(String $idempotencyKey) {
        
    } */

    public function getPseFinancialInstitutions(
        Config $configData
    ) {
        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();
        
        $this->payInService = new ColombiaService;
        $payInResponse = $this->payInService->getPseFinancialInstitutions($configData, $accessToken);
        return $payInResponse;
    }

    public function getInstallmentPlans(
        Config $configData,
        String $planId = null
    )
    {
        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();

        $this->payInService = new CommonService;
        $installmentPlanResponse = $this->payInService->getInstallmentPlans($configData, $accessToken, $planId);
        return $installmentPlanResponse;
    }

    public function createProposal(
        Config $configData,
        PayInRequest $payInRequest
    )
    {
        $this->authClient = new AuthClient($configData);
        $accessToken = $this->getAccessToken();

        $this->payInService = new CommonService;
        $proposalResponse = $this->payInService->createProposal($configData, $payInRequest, $accessToken);
        return $proposalResponse;
    }

    protected function getAccessToken()
    {
        try {
            $authResponse = $this->authClient->authenticate();
            if (property_exists($authResponse, 'access_token')) {
                return $authResponse->access_token;
            }
            return null;
        } catch (\Exception $e) {
            throw new \Exception("Error while getting the access token. {$e->getMessage()}");
        }
    }
}
