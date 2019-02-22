<?php
namespace Training\MerchantsRepo\Api\Data;

interface MerchantDTOInterface {

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getRegionId();

    /**
     * @return string
     */
    public function getCountryId();

    /**
     * @param int $id
     * @return \Training\MerchantsRepo\Api\Data\MerchantDTOInterface
     */
    public function setId($id);

    /**
     * @param string $name
     * @return \Training\MerchantsRepo\Api\Data\MerchantDTOInterface
     */
    public function setName($name);

    /**
     * @param string $country
     * @return \Training\MerchantsRepo\Api\Data\MerchantDTOInterface
     */
    public function setCountryId($country);

    /**
     * @param int $region
     * @return \Training\MerchantsRepo\Api\Data\MerchantDTOInterface
     */
    public function setRegionId($region);
}