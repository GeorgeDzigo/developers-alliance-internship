<?php

namespace Mastering\SampleData\Model;

use Mastering\SampleData\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements \Mastering\SampleData\Api\ItemRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory) {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
