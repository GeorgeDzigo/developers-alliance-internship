<?php

namespace Alliance\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Psr\Log\LoggerInterface;


class Weather extends AbstractDb
{
    /** @var string  */
    protected const TABLE_NAME = 'weather';
    
    /** @var string */
    protected const PRIMARY_KEY = 'id';

    public function __construct(
        Context         $context,
        LoggerInterface $logger,
                        $connectionName = null
    )
    {
        parent::__construct($context, $connectionName);
        $this->logger = $logger;
    }
    
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
    
    
    public function getTableFields() 
    {
        try {
            return array_keys($this->getConnection()->describeTable($this->getMainTable()));
        } catch (LocalizedException $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }
}
