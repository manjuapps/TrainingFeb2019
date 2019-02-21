<?php
namespace Training\GeoIp\Controller\Types;

use Magento\Framework\App\Action\Context;

class Raw extends \Magento\Framework\App\Action\Action {

    public $rawFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\RawFactory $rawFactory
    )
    {
        parent::__construct($context);
        $this->rawFactory = $rawFactory;
    }

    public function execute()
    {
        $raw = $this->rawFactory->create();
        $raw->setContents("Hello!!!");
        return $raw;
    }
}