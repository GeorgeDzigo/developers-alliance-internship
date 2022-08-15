<?php

namespace Alliance\SignUpSheet\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    /** @var string */
    private $postUrl = 'signup/index/save';
    
    public function getPostUrl() {
        return $this->postUrl;
    }

}
