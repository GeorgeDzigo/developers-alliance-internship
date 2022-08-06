<?php

namespace Mastering\SampleData\Api;

interface ItemRepositoryInterface
{
    /**
     * @return \Mastering\SampleData\Api\Data\ItemInterface[]
    */
    public function getList();
}
