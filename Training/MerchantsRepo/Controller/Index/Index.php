<?php
namespace Training\MerchantsRepo\Controller\Index;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Context;
use Training\MerchantsRepo\Api\MerchantsRepositoryInterface;

class Index extends \Magento\Framework\App\Action\Action {

    public $merchantsRepository;

    public $searchCriteriaBuilder;

    public $scopeConfig;

    public function __construct(
        Context $context,
        MerchantsRepositoryInterface $merchantsRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        parent::__construct($context);
        $this->merchantsRepository = $merchantsRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute()
    {
        var_dump($this->merchantsRepository->getById(1)->getName());

        $searchCriteria = $this->searchCriteriaBuilder->addFilter("region_id", 14)->create();
        $searchResults = $this->merchantsRepository->getList($searchCriteria);

        var_dump($searchResults->getTotalCount());

        var_dump($this->scopeConfig->getValue('training/generated/custom'));

//        $items = $searchResults->getItems();
//        foreach ($items as $merchantDTO) {
//            var_dump($merchantDTO);
//        }
        exit;
    }

}