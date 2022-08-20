<?php

namespace Alliance\Weather\Model;

use Magento\Framework\Model\AbstractModel;
use Alliance\Weather\Model\ResourceModel\Weather as WeatherResourceModel;

class Weather extends AbstractModel
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(WeatherResourceModel::class);
    }
}
