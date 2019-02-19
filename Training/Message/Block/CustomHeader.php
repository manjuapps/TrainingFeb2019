<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Message\Block;

use Magento\Framework\View\Element\Template;

class CustomHeader extends \Magento\Theme\Block\Html\Header
{
    public $visitorLocation;

    public function __construct(
        Template\Context $context,
        \Training\GeoIp\Api\VisitorLocationInterface $visitorLocation,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->visitorLocation = $visitorLocation;
    }

    /**
     * Retrieve welcome text
     *
     * @return string
     */
    public function getWelcome()
    {
        $defaultMessage = parent::getWelcome();

        $areas = $this->visitorLocation->getAreas();
        if ($areas) {
            $defaultMessage = "Welcome to " . $areas->getCountry() . " - " . $areas->getRegion();
        }

        return $defaultMessage;
    }
}
