<?php

namespace Mastering\SampleData\Controller\adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultFactory = ResultFactory::class;
    
    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
