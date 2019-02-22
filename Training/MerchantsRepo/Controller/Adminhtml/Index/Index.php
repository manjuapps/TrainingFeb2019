<?php
namespace Training\MerchantsRepo\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action {

    public $pageFactory;

    const ADMIN_RESOURCE = "Training_MerchantsRepo::manage";

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory
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