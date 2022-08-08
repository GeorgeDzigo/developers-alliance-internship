<?php

namespace Pixelpro\Helloworld\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    static $tableName = 'pixelpro_helloworld_post';
    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if(!$setup->tableExists($this->tableName)) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable($this->tableName)
            )->addColumn(
                'post_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true
                ],
                'Post ID'
            )->addColumn(
                'title',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable' => false
                ],
                'Title'
            )->addColumn(
                'content',
                Table::TYPE_TEXT,
                '64k',
                [],
                'Content'
            )->setComment('Post Table');

            $setup->getConnection()->createTable($table);

            $setup->getConnection()->addIndex(
                $setup->getConnection()->getTable($this->tableName),
                $setup->getIdxName(
                    $setup->getTable($this->tableName),
                    ['title', 'content'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                )
            );
        }

        $setup->endSetup();
    }
}
