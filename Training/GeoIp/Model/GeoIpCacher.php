<?php
namespace Training\GeoIp\Model;

use Training\GeoIp\Api\GeoIpInterface;

class GeoIpCacher implements GeoIpInterface {

    public $cacheManager;

    public $geoIp;

    public function __construct(
        \Magento\Framework\App\CacheInterface $cacheManager,
        \Training\GeoIp\Api\GeoIpInterface $geoIp
    )
    {
        $this->cacheManager = $cacheManager;
        $this->geoIp = $geoIp;
    }

    /**
     * @param string $ip
     * @return string[]
     */
    public function lookup($ip)
    {
         $cacheKey = "training_geoip_" . $ip;
         $data = $this->cacheManager->load($cacheKey);


         if ($data !== false) {
             $response = $data;
         } else {
             $response = $this->geoIp->lookup($ip);
             $this->cacheManager->save($response, $cacheKey);
         }

         return $response;
    }
}