<?php

namespace Alliance\SignUpSheet\Model\ResourceModel;

class User extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    private const TABLE_NAME = 'sign_up_sheet';
    private const PRIMARY_KEY = 'id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}
