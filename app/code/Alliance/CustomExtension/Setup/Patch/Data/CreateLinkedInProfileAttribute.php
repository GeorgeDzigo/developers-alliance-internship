<?php

namespace Alliance\CustomExtension\Setup\Patch\Data;

use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class CreateLinkedInProfileAttribute implements \Magento\Framework\Setup\Patch\DataPatchInterface
{

    /** @var string */
    protected const ATTR_CODE = 'linkedin_profile';

    /** @var string */
    protected const ATTR_LABEL = 'Linkedin Profile';

    /** @var EavSetupFactory */
    protected EavSetupFactory $eavSetupFactory;

    /** @var ModuleDataSetupInterface */
    protected ModuleDataSetupInterface $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig
    )
    {
        $this->eavConfig = $eavConfig;
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory; 
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            Customer::ENTITY,
            self::ATTR_CODE,
            [
                'label' => self::ATTR_LABEL,
                'required' => 0,
                'user_defined' => 1,
                'system' => 0,
                'position' =>  30,
            ]
        );


        $eavSetup->addAttributeToSet(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
            1,
            self::ATTR_CODE
        );
        
        $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, self::ATTR_CODE);
        
        $attribute->setData(
            'used_in_forms',
            [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]
        );
        
        
        $attribute->setData(
            'validate_rules',
            [
                'input_validation' => 1,
                'min_text_length' => 28,
                'max_text_length' => 255
            ]
        );
        
        $attribute->getResource()->save($attribute);
        
        $this->moduleDataSetup->endSetup();
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }
}
