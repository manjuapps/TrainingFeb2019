<?php
namespace Training\GeoIp\Model;

use Magento\Framework\HTTP\ClientFactory;
use Training\GeoIp\Api\GeoIpInterface;

class GeoIp implements GeoIpInterface {

    private $httpClient;

    public function __construct(
        ClientFactory $httpClient
    )
    {
        $this->httpClient = $httpClient;
    }

    public function lookup($ip)
    {
        $response = null;
        try {
            $httpClient = $this->httpClient->create();
            $httpClient->get("http://ip-api.com/json/" . $ip);
            $response = $httpClient->getBody();
        } catch (\Exception  $e) {
            $response = '';
        }

        return $response;
    }
}