<?php
namespace Training\MerchantsRepo\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Training\MerchantsRepo\Api\Data\MerchantDTOInterface;

class MerchantsDTO extends AbstractExtensibleObject implements MerchantDTOInterface {

    public function getId()
    {
        return $this->_get('id');
    }

    public function getName()
    {
        return $this->_get('name');
    }

    public function getRegionId()
    {
        return $this->_get('region');
    }

    public function getCountryId()
    {
        return $this->_get('country');
    }

    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    public function setCountryId($country)
    {
        return $this->setData('country', $country);
    }

    public function setRegionId($region)
    {
        return $this->setData('region', $region);
    }

}