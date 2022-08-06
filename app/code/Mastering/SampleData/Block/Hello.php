<?php

namespace Mastering\SampleData\Block;

use Magento\Framework\View\Element\Template;
use Mastering\SampleData\Model\ResourceModel\Item\Collection;
use Mastering\SampleData\Model\ResourceModel\Item\CollectionFactory;

class Hello extends \Magento\Framework\View\Element\Template
{
    private CollectionFactory $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \Mastering\SampleData\Model\Item[]
    */
    public function getItems() {
        return $this->collectionFactory->create()->getItems();
    }
}
