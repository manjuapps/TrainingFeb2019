<?php
namespace Training\GeoIp\Model\Data;

use Training\GeoIp\Api\Data\LocationDTOInterface;

class LocationDTO implements LocationDTOInterface {

    private $country;

    private $region;

    /**
     * LocationDTO constructor.
     * @param $country
     * @param $region
     */
    public function __construct($country, $region)
    {
        $this->country = $country;
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

}