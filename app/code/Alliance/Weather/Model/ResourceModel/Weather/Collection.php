<?php

namespace Alliance\Weather\Model\ResourceModel\Weather;

use Alliance\Weather\Model\Weather;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Alliance\Weather\Model\ResourceModel\Weather as WeatherResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Weather::class, WeatherResourceModel::class);
    }
}
