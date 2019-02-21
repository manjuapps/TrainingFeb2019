<?php
namespace Training\Merchants\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface {

    public $eavSetupFactory;

    public $eavConfig;

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $setup->getConnection()->insertArray(
                $setup->getTable('training_merchant_products'),
                ['merchant_id', 'product_id'],
                [
                    [1, 1],
                    [2, 1],
                    [3, 1],
                    [4, 1],
                    [5, 1]
                ]
            );
        }

        if (version_compare($context->getVersion(), '1.0.3', '<')) {
            $setup->getConnection()->insertArray(
                $setup->getTable('training_merchant_products'),
                ['merchant_id', 'product_id'],
                [
                    [1, 2],
                    [2, 2],
                    [3, 3],
                    [4, 3],
                    [6, 2]
                ]
            );
        }

        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $eavSetup->addAttribute(
                'customer',
                'sample_code',
                [
                    'type'  => 'varchar',
                    'label' => 'Sample Code',
                    'input' => 'text',
                    'required' => false,
                    'sort_order' => 20,
                    'position' => 20,
                    'system' => false,
                    'visible' => true,
                    'user_defined' => false
                ]
            );

            $sampleCode = $this->eavConfig->getAttribute('customer', 'sample_code');
            $sampleCode->setData('used_in_forms', ['adminhtml_customer']);
            $sampleCode->save();
        }

        $setup->endSetup();
    }
}