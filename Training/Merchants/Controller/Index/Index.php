<?php
namespace Training\Merchants\Controller\Index;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action {

    public $merchantsFactory;

    public $merchantResource;

    public $collectionFactory;

    public function __construct(
        Context $context,
        \Training\Merchants\Model\MerchantsFactory $merchantsFactory,
        \Training\Merchants\Model\ResourceModel\Merchants $merchantResource,
        \Training\Merchants\Model\ResourceModel\Merchants\CollectionFactory $collectionFactory
    )
    {
        parent::__construct($context);
        $this->merchantsFactory = $merchantsFactory;
        $this->merchantResource = $merchantResource;
        $this->collectionFactory = $collectionFactory;

    }

    public function execute()
    {
        /** @var \Training\Merchants\Model\Merchants $merchant */
        $merchant = $this->merchantsFactory->create();
        $this->merchantResource->load($merchant, $this->getRequest()->getParam('id', 1));
        var_dump($merchant);

        /** @var \Training\Merchants\Model\Merchants $merchant1 */
//        $merchant1 = $this->merchantsFactory->create();
//        $merchant1->setName("Test Merchant 10")->setRegionId(12)->setCountryId('US');
//        $merchant1->save();

//        var_dump($merchant1->getName());

        /** @var \Training\Merchants\Model\Merchants $merchant2 */
//        $merchant2 = $this->merchantsFactory->create();
//        $collection = $merchant2->getCollection()->addFieldToFilter('region_id', 12);
//        foreach ($collection as $model) {
//            var_dump($model->getName());
//        }

        $collection = $this->collectionFactory->create();
        foreach ($collection as $model) {
            var_dump($model->getName());
            var_dump($model->getAssociatedProducts());
        }
        exit();
    }
}