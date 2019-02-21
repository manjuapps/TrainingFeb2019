<?php
namespace Training\Merchants\Model\ResourceModel\Merchants;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection{

    protected function _construct()
    {
        $this->_init("Training\Merchants\Model\Merchants", "Training\Merchants\Model\ResourceModel\Merchants");
    }


}