<?php
namespace Training\GeoIp\Model;

use Training\GeoIp\Api\ConverterInterface;

class Converter implements ConverterInterface {

    public $geoIp;

    public function __construct(
        \Training\GeoIp\Api\GeoIpInterface $geoIpLocal
    )
    {
        $this->geoIp = $geoIpLocal;
    }

    public function convert($ip)
    {
        return $this->geoIp->lookup($ip);
    }
}