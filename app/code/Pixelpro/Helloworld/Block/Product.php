<?php

namespace Pixelpro\Helloworld\Block;

class Product extends \Magento\Framework\View\Element\Template
{
    protected $productCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    )
    {

        $this-> productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }


    public function getProductCollection() {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3);
        
        return $collection;
    }
}
