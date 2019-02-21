<?php

namespace Training\Merchants\Model\ResourceModel;

use Magento\Directory\Model\RegionFactory;
use Magento\Directory\Model\ResourceModel\Region;
use Magento\Framework\Model\ResourceModel\Db;

class Merchants extends Db\AbstractDb
{

    public $regionFactory;

    public $regionResource;

    public function __construct(
        Db\Context $context,
        RegionFactory $regionFactory,
        Region $regionResource,
        $connectionName = null)
    {
        parent::__construct($context, $connectionName);
        $this->regionFactory = $regionFactory;
        $this->regionResource = $regionResource;
    }

    protected function _construct()
    {
        $this->_init("training_merchants", "id");
    }

    public function getRegion($id)
    {
        $regionModel = $this->regionFactory->create();
        $this->regionResource->load($regionModel, $id);
        return $regionModel->getName();
    }

    public function getAssociatedProducts($merchantId)
    {
        $sql = $this->getConnection()->select()
            ->from('training_merchant_products')
            ->columns(['product_id'])
            ->where('merchant_id=?', $merchantId);

        return $this->getConnection()->fetchAll($sql, [], \PDO::FETCH_COLUMN);
    }
}