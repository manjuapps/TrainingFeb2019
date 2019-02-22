<?php
namespace Training\MerchantsRepo\Model;

use Training\MerchantsRepo\Api\Data;
use Training\MerchantsRepo\Api\MerchantsRepositoryInterface;
use Training\MerchantsRepo\Api\SearchResultsInterface;

class MerchantsRepository implements MerchantsRepositoryInterface {

    public $modelFactory;

    public $resource;

    public $collectionFactory;

    public $merchantDTOFactory;

    public $dataObjectHelper;

    public $collectionProcessor;

    public $searchResultsInterfaceFactory;

    public function __construct(
        \Training\Merchants\Model\MerchantsFactory $modelFactory,
        \Training\Merchants\Model\ResourceModel\Merchants $resource,
        \Training\Merchants\Model\ResourceModel\Merchants\CollectionFactory $collectionFactory,
        \Training\MerchantsRepo\Api\Data\MerchantDTOInterfaceFactory $merchantDTOFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        \Training\MerchantsRepo\Api\SearchResultsInterfaceFactory $searchResultsInterfaceFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
    )
    {
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
        $this->merchantDTOFactory = $merchantDTOFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsInterfaceFactory = $searchResultsInterfaceFactory;
    }

    public function getById($id)
    {
        $merchantDTO = $this->merchantDTOFactory->create();

        $merchantModel = $this->modelFactory->create();
        $this->resource->load($merchantModel, $id);

        $this->dataObjectHelper->populateWithArray(
            $merchantDTO,
            $merchantModel->getData(),
            '\Training\MerchantsRepo\Api\Data\MerchantDTOInterface'
        );

        return $merchantDTO;
    }

    public function save(Data\MerchantDTOInterface $merchants)
    {
        // TODO: Implement save() method.
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Training\MerchantsRepo\Api\SearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsInterfaceFactory->create();
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $dtoArray = [];
        $items = $collection->getItems();
        foreach ($items as $model) {
            $merchantDTO = $this->merchantDTOFactory->create();

            $this->dataObjectHelper->populateWithArray(
                $merchantDTO,
                $model->getData(),
                '\Training\MerchantsRepo\Api\Data\MerchantDTOInterface'
            );

            $dtoArray[] = $merchantDTO;
        }

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($dtoArray);

        return $searchResults;
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

}