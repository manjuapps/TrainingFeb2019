<?php
namespace Training\GeoIp\Api;

interface VisitorLocationInterface {

    /**
     * @return \Training\GeoIp\Api\Data\LocationDTOInterface
     */
    public function getAreas();
}