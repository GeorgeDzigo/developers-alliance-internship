<?php

namespace Mastering\SampleData\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{

    /**
     * @inheritDoc
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_data'),
            [
                'name' => 'Item 1'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_data'),
            [
                'name' => 'Item 2'
            ]
        );

        $setup->endSetup();
    }
}
