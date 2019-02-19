<?php
namespace Training\GeoIp\Model;

use Training\GeoIp\Api\ConverterInterface;

class Converter implements ConverterInterface {

    public $geoIp;

    public $locationDTOFactory;

    public function __construct(
        \Training\GeoIp\Api\GeoIpInterface $geoIpLocal,
        \Training\GeoIp\Api\Data\LocationDTOInterfaceFactory $locationDTOFactory
    )
    {
        $this->geoIp = $geoIpLocal;
        $this->locationDTOFactory = $locationDTOFactory;
    }

    public function convert($ip)
    {
        $response = json_decode($this->geoIp->lookup($ip), true);
        $locationData = $this->locationDTOFactory->create([
            'country' => $response['countryCode'],
            'region' => $response['region']
        ]);

        return $locationData;
    }
}