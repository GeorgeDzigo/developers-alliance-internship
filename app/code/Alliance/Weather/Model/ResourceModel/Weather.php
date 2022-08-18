<?php

namespace Alliance\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Weather extends AbstractDb
{
    /** @var string  */
    protected const TABLE_NAME = 'weather';
    
    
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, 'id');
    }
}
