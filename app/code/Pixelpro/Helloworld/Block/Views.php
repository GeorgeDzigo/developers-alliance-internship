<?php

namespace Pixelpro\Helloworld\Block;

use Magento\Framework\View\Element\Template;

class Views extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    public function __construct(
        Template\Context $context,
        Pixelpro\Helloworld\Model\PostFactory $postFactory,
        array $data = []
    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context, $data);
    }
    
    public function getPostCollection() {
        $post = $this->_postFactory->create();
        
        return $post->getCollection();
    }
}
