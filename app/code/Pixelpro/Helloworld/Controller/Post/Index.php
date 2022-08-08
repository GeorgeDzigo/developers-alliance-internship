<?php

namespace Pixelpro\Helloworld\Controller\Post;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_postFactory;
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Pixelpro\Helloworld\Model\PostFactory $postFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        
        return parent::__construct($context);
    } 

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
    }
}
