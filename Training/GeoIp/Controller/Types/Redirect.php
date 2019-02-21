<?php
namespace Training\GeoIp\Controller\Types;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;

class Redirect extends \Magento\Framework\App\Action\Action {

    public $redirectFactory;

    public function __construct(
        Context $context,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        return $this->redirectFactory->create()->setPath("geoip/index/index");
    }
}