<?php
namespace Training\GeoIp\Model;

use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Training\GeoIp\Api\ConverterInterface;
use Training\GeoIp\Api\VisitorLocationInterface;

class VisitorLocation implements VisitorLocationInterface {

    private $converter;

    private $remoteAddress;

    public function __construct(
        ConverterInterface $converter,
        RemoteAddress $remoteAddress
    )
    {
        $this->converter = $converter;
        $this->remoteAddress = $remoteAddress;
    }

    public function getAreas()
    {
        return $this->converter->convert($this->getIp());
    }

    public function getIp()
    {
        return $this->remoteAddress->getRemoteAddress() == "127.0.0.1" ? "8.8.8.8" : $this->remoteAddress->getRemoteAddress();
    }
}