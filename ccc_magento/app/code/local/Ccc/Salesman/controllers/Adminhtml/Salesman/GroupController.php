<?php

class Ccc_Salesman_Adminhtml_Salesman_GroupController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('salesman/salesman');
    }
    
    public function saveAction()
    {
        $model = Mage::getModel('eav/entity_attribute_group');

        $model->setAttributeGroupName($this->getRequest()->getParam('attribute_group_name'))
              ->setAttributeSetId($this->getRequest()->getParam('attribute_set_id'));

        if( $model->itemExists() ) {
            Mage::getSingleton('salesman/session')->addError(Mage::helper('salesman')->__('A group with the same name already exists.'));
        } else {
            try {
                $model->save();
            } catch (Exception $e) {
                Mage::getSingleton('salesman/session')->addError(Mage::helper('salesman')->__('An error occurred while saving this group.'));
            }
        }
    }

}