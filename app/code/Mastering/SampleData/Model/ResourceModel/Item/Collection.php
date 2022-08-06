<?php

namespace Mastering\SampleData\Model\ResourceModel\Item;

use Mastering\SampleData\Model\Item;
use Mastering\SampleData\Model\ResourceModel\Item as ItemResource;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }
}
