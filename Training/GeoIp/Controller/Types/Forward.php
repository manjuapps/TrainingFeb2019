<?php
namespace Training\GeoIp\Controller\Types;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;

class Forward extends \Magento\Framework\App\Action\Action {

    public $forwardFactory;

    public function __construct(
        Context $context,
        ForwardFactory $forwardFactory
    )
    {
        parent::__construct($context);
        $this->forwardFactory = $forwardFactory;
    }

    public function execute()
    {
        return $this->forwardFactory->create()->setModule('customer')
            ->setController('account')->forward("create");
    }
}