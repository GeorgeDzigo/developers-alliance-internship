<?php

namespace Alliance\SignUpSheet\Model\ResourceModel\User;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Alliance\SignUpSheet\Model\User;
use Alliance\SignUpSheet\Model\ResourceModel\User as UserResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(User::class, UserResource::class);
    }
}
