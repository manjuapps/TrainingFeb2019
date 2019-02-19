<?php

namespace Training\GeoIp\Controller\Types;

use Magento\Framework\App\Action\Context;

class Page extends \Magento\Framework\App\Action\Action {

    public $pageFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}