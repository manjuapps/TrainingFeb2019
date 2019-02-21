<?php
namespace Training\Merchants\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insertArray(
            $setup->getTable('training_merchants'),
            ['name', 'country_id', 'region_id'],
            [
                ['Test Merchant 1', 'US', 12],
                ['Test Merchant 2', 'US', 13],
                ['Test Merchant 3', 'US', 14],
                ['Test Merchant 4', 'US', 12],
                ['Test Merchant 5', 'US', 14],
                ['Test Merchant 6', 'US', 14]
            ]);

        $setup->endSetup();
    }
}