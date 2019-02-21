<?php
namespace Training\Merchants\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface {

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $tableName = $setup->getTable('training_merchant_products');
            if(!$setup->tableExists($tableName)) {
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
                        'ID'
                    )->addColumn(
                        'merchant_id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'nullable'  => false,
                            'unsigned'  => true
                        ],
                        'Merchant ID'
                    )->addColumn(
                        'product_id',
                        Table::TYPE_INTEGER,
                        10,
                        [
                            'nullable'  => false,
                            'unsigned'  => true
                        ],
                        'Product ID'
                    )->addIndex(
                        $setup->getIdxName($tableName, ['merchant_id']),
                        ['merchant_id']
                    )->addForeignKey(
                        $setup->getFkName($tableName, 'merchant_id', $setup->getTable('training_merchants'), 'id'),
                        'merchant_id',
                        $setup->getTable('training_merchants'),
                        'id',
                        Table::ACTION_CASCADE
                    )->addForeignKey(
                        $setup->getFkName($tableName, 'product_id', $setup->getTable('catalog_product_entity'), 'entity_id'),
                        'product_id',
                        $setup->getTable('catalog_product_entity'),
                        'entity_id',
                        Table::ACTION_CASCADE
                    )->setComment('Merchant Product Information');

                $setup->getConnection()->createTable($table);
            }
        }

        $setup->endSetup();
    }
}