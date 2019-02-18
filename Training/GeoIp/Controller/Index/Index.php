<?php

namespace Training\GeoIp\Controller\Index;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action {

    private $visitorLocation;

    public function __construct(
        Context $context,
        \Training\GeoIp\Api\VisitorLocationInterface $visitorLocation
    )
    {
        parent::__construct($context);
        $this->visitorLocation = $visitorLocation;
    }

    public function execute()
    {
        var_dump($this->visitorLocation->getAreas());
        exit;
    }
}