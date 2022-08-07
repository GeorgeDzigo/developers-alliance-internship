<?php

namespace Pixelpro\Helloworld\Controller\Index;

use Magento\Framework\App\RequestInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        echo 'Hello world';
        exit;
    }
}
