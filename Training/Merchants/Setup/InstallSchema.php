<?php
namespace Training\Merchants\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable("training_merchants");

        if (!$setup->tableExists($tableName)) {
            $table = $setup->getConnection()->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'  => false,
                        'unsigned'  => true,
                        'primary'   => true,
                        'identity'  => true
                    ],
                    'Merchant ID'
                )->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable'  => false
                    ],
                    'Merchant Name'
                )->addColumn(
                    'country_id',
                    Table::TYPE_TEXT,
                    2,
                    [
                        'nullable'  => false
                    ],
                    'Merchant Country'
                )->addColumn(
                    'region_id',
                    Table::TYPE_INTEGER,
                    10,
                    [
                        'nullable'  => false,
                        'unsigned'  => true
                    ],
                    'Merchant Region'
                )->addColumn(
                    'created_at',
                    Table::TYPE_DATETIME,
                    null,
                    [
                        'nullable'  => false
                    ],
                    'Timestamp'
                )->addIndex(
                    $setup->getIdxName($tableName, ['name']),
                    ['name']
                )->addForeignKey(
                    $setup->getFkName($tableName, 'country_id', $setup->getTable("directory_country"), "country_id"),
                    'country_id',
                    $setup->getTable("directory_country"),
                    "country_id",
                    Table::ACTION_CASCADE
                )->addForeignKey(
                    $setup->getFkName($tableName, 'region_id', $setup->getTable("directory_country_region"), "region_id"),
                    'region_id',
                    $setup->getTable("directory_country_region"),
                    "region_id",
                    Table::ACTION_CASCADE
                )->setComment('Merchant Information');

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}