<?php
namespace Training\MerchantsRepo\Api;

interface SearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface {

    /**
     * Get items list.
     *
     * @return \Training\MerchantsRepo\Api\Data\MerchantDTOInterface[]
     */
    public function getItems();

    /**
     * Set items list.
     *
     * @param \Training\MerchantsRepo\Api\Data\MerchantDTOInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}