<?php
namespace Training\MerchantsRepo\Api;

interface MerchantsRepositoryInterface {

    /**
     * @param int $id
     * @return \Training\MerchantsRepo\Api\Data\MerchantDTOInterface
     */
    public function getById($id);

    /**
     * @param \Training\MerchantsRepo\Api\Data\MerchantDTOInterface $merchants
     * @return \Training\MerchantsRepo\Api\Data\MerchantDTOInterface
     */
    public function save(Data\MerchantDTOInterface $merchants);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Training\MerchantsRepo\Api\SearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id);
}