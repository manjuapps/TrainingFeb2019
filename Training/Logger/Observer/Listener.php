<?php
namespace Training\Logger\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Listener implements ObserverInterface {

    public $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
            $eventParameters = $observer->getEvent()->getRequest();
            $this->logger->info("Logging from custom observer");
            $this->logger->error("ERROR");
            $this->logger->warning("WARNING");
            $this->logger->critical("CRITICAL");
            $this->logger->info($eventParameters);
    }
}