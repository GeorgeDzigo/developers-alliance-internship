<?php

namespace Mastering\SampleData\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('mastering_sample_data')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            [
                'auto_increment' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
            'Item Id'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Item name'
        )->addIndex(
            $setup->getIdxName('mastering_sample_data', ['name']),
            ['name']
        )->setComment(
            'Sample Items'
        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
