<?php
namespace Training\GeoIp\Api;

interface GeoIpInterface {

    /**
     * @param string $ip
     * @return string[]
     */
    public function lookup($ip);
}