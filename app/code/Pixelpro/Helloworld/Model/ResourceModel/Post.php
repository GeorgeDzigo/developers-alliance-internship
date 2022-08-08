<?php

namespace Pixelpro\Helloworld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(Context $context)
    {
        parent::_construct($context);
    }

    protected function _construct()
    {
        $this->_init('pixelpro_helloworld_post', 'post_id');
    }
}
