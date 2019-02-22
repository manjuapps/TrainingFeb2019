<?php
namespace Training\MerchantsRepo\Ui\Component;

class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider {

    public function getData()
    {
        return $this->getFromCollection($this->getSearchResult());
    }

    /**
     * @param \Training\Merchants\Model\ResourceModel\Merchants\Collection $collection
     * @return array
     */
    public function getFromCollection($collection) {
        $items = [];

        $items['items'] = [];
        foreach ($collection as $item) {
            $items['items'][] = $item->getData();
        }

        $items['totalRecords'] = $collection->getSize();

        return $items;
    }
}