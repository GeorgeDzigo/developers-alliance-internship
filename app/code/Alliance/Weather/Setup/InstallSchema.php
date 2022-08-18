<?php

namespace Alliance\Weather\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    private const TABLE = 'weather';

    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable(self::TABLE)
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
            'city',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => false,
            ],
            'City'
        )->addColumn(
            'country',
            TABLE::TYPE_TEXT,
            255,
            [
                'nullable' => false
            ],
            'Country'
        )->addColumn(
            'temperature',
            Table::TYPE_FLOAT,
            null,
            [
                'nullable' => false
            ],
            'Temperature'
        )->addColumn(
            'feels_like',
            Table::TYPE_FLOAT,
            null,
            [
                'nullable' => false
            ],
            'Feels likes'
        )->addColumn(
            'pressure',
            Table::TYPE_INTEGER,
            null,
            [
                'nullable' => false
            ],
            'Pressure'
        )->addColumn(
            'humidity',
            Table::TYPE_INTEGER,
            null,
            [
                'nullable' => false
            ],
            'Humidity'
        )->addColumn(
            'wind_speed',
            Table::TYPE_INTEGER,
            null,
            [
                'nullable' => false,
            ],
            'Wind Speed'
        )->addColumn(
            'sunrise',
            Table::TYPE_DATE,
            null,
            [
                'nullable' => false
            ],
            'Sunrise'
        )->addColumn(
            'sunset',
            Table::TYPE_DATE,
            null,
            [
                'nullable' => false
            ],
            'Sunset'
        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
