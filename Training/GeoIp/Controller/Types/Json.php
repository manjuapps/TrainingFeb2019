<?php
namespace Training\GeoIp\Controller\Types;

use Magento\Framework\App\Action\Context;

class Json extends \Magento\Framework\App\Action\Action {

    public $jsonFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    )
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        $json = $this->jsonFactory->create();
        $json->setData(["name" => "Jay", "dob" => "May"]);
        return $json;
    }
}