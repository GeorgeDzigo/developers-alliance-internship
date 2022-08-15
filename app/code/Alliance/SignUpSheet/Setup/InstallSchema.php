<?php

namespace Alliance\SignUpSheet\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    const TABLE_NAME = 'sign_up_sheet';

    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable(self::TABLE_NAME)
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
            'Id'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => false
            ],
            'Name'
        )->addColumn(
            'date',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => false
            ],
            'Date'
        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
