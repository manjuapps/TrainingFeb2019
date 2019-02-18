<?php

namespace Training\GeoIp\Api\Data;

interface LocationDTOInterface {

    /**
     * @return string
     */
    public function getRegion();

    /**
     * @return string
     */
    public function getCountry();
}