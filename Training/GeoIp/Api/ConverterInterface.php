<?php

namespace Training\GeoIp\Api;

interface ConverterInterface {

    /**
     * @param string $ip
     * @return \Training\GeoIp\Api\Data\LocationDTOInterface
     */
    public function convert($ip);
}