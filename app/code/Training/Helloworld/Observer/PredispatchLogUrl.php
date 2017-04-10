<?php

namespace Training\Helloworld\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class PredispatchLogUrl implements ObserverInterface {

    /**
     * Object logger
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    /**
     * PredispatchLogUrl constructor.
     *
     * @param \Psr\Log\LoggerInterface $log Magento Logger Interface
     *
     * @return PredispatchLogUrl
     */
    public function __construct(\Psr\Log\LoggerInterface $log)
    {
        $this->logger = $log;
    }

    /**
     * Log the url
     *
     * @param \Magento\Framework\Event\Observer $observer Magento Observer Object
     *
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $url = $observer->getEvent()->getRequest()->getPathInfo();
        $this->logger->debug('Current Url : '.$url);
    }

}