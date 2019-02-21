<?php
namespace Training\CustomLayouts\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Custom implements ArgumentInterface {

    public $visitorLocation;

    public function __construct(\Training\GeoIp\Api\VisitorLocationInterface $visitorLocation)
    {
        $this->visitorLocation = $visitorLocation;
    }

    public function getMessage() {
        $areas = $this->visitorLocation->getAreas();
        return "ViewModel: I am from " . $areas->getCountry() . " - " . $areas->getRegion();
    }
}