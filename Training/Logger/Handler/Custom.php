<?php

namespace Training\Logger\Handler;

use Monolog\Logger;

class Custom extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/custom.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::ERROR;
}
