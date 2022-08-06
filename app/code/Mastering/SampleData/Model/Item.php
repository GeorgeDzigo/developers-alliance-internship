<?php

namespace Mastering\SampleData\Model;

class Item extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Mastering\SampleData\Model\ResourceModel\Item::class);
    }
}
