<?php
namespace Training\CustomLayouts\Block;

use Magento\Framework\View\Element\Template;

class Custom extends Template {

    public $visitorLocation;

    public function __construct(
        Template\Context $context,
        \Training\GeoIp\Api\VisitorLocationInterface $visitorLocation,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->visitorLocation = $visitorLocation;
    }

    public function getMessage()
    {
        $areas = $this->visitorLocation->getAreas();
        return "I am from " . $areas->getCountry() . " - " . $areas->getRegion();
    }
}
