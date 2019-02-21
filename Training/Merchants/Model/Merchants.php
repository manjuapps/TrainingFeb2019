<?php
namespace Training\Merchants\Model;

use Magento\Framework\Model\AbstractModel;

class Merchants extends AbstractModel {

    protected function _construct()
    {
        $this->_init("Training\Merchants\Model\ResourceModel\Merchants");
    }

    public function getRegion()
    {
        return $this->getResource()->getRegion($this->getRegionId());
    }

    public function getAssociatedProducts() {
        return $this->getResource()->getAssociatedProducts($this->getId());
    }
}