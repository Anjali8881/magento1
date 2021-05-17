<?php

class Ccc_Salesman_Block_Adminhtml_Salesman_Attribute extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
    	$this->_blockGroup = 'salesman';
        $this->_controller = 'adminhtml_salesman_attribute';
        $this->_headerText = Mage::helper('salesman')->__('Manage Attributes');
        $this->_addButtonLabel = Mage::helper('salesman')->__('Add New Attribute');
        parent::__construct();
    }

}
