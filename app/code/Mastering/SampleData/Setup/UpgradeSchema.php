<?php

namespace Mastering\SampleData\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{

    /**
     * @inheritDoc
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('mastering_sample_data'),
                'description',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => false,
                    'comment' => 'Item description'
                ]
            );
        }
        $setup->endSetup();
    }
}
