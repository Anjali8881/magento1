<?php
class Ccc_Vendor_Adminhtml_Product_GroupController extends Mage_Adminhtml_Controller_Action
{
    public function saveAction()
    {
        $model = Mage::getModel('eav/entity_attribute_group');

        $model->setAttributeGroupName($this->getRequest()->getParam('attribute_group_name'))
              ->setAttributeSetId($this->getRequest()->getParam('attribute_set_id'));

        if( $model->itemExists() ) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('vendor')->__('A group with the same name already exists.'));
        } else {
            try {
                $model->save();
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('vendor')->__('An error occurred while saving this group.'));
            }
        }
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('vendor/products');
    }
}
