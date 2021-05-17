<?php

class Ccc_Salesman_Block_Adminhtml_Salesman_Attribute_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('salesman_attribute_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('salesman')->__('Attribute Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('main', array(
            'label'     => Mage::helper('salesman')->__('Properties'),
            'title'     => Mage::helper('salesman')->__('Properties'),
            'content'   => $this->getLayout()->createBlock('salesman/adminhtml_salesman_attribute_edit_tab_main')->toHtml(),
            'active'    => true
        ));

        $model = Mage::registry('entity_attribute');

        $this->addTab('labels', array(
            'label'     => Mage::helper('salesman')->__('Manage Label / Options'),
            'title'     => Mage::helper('salesman')->__('Manage Label / Options'),
            'content'   => $this->getLayout()->createBlock('salesman/adminhtml_salesman_attribute_edit_tab_options')->toHtml(),
        ));
        
        // if ('select' == $model->getFrontendInput()) {
        //     $this->addTab('options_section', array(
        //         'label'     => Mage::helper('salesman')->__('Options Control'),
        //         'title'     => Mage::helper('salesman')->__('Options Control'),
        //         'content'   => $this->getLayout()->createBlock('salesman/adminhtml_salesman_attribute_edit_tab_options')->toHtml(),
        //     ));
        // }

        return parent::_beforeToHtml();
    }

}
