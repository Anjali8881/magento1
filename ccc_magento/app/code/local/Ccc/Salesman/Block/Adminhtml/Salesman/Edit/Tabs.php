<?php

class Ccc_Salesman_Block_Adminhtml_Salesman_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{


    public function __construct()
    {
      parent::__construct();
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('salesman')->__('Salesman Information'));
    }
    public function getSalesman()
    {
        return Mage::registry('current_salesman');
    }

    protected function _beforeToHtml()
    {
        $salesman = $this->getSalesman();

        if (!($setId = $salesman->getAttributeSetId())) {
            $setId = $this->getRequest()->getParam('set', null);
        }

        if($setId){
            $salesmanAttributes = Mage::getResourceModel('salesman/salesman_attribute_collection');
            if (!$this->getSalesman()->getId()) {
                foreach ($salesmanAttributes as $attribute) {
                     $default = $attribute->getDefaultValue();
                    if ($default != '') {
                         $this->getSalesman()->setData($attribute->getAttributeCode(), $default);
                    }   
                }
            }

            $attributeSetId = $this->getSalesman()->getResource()->getEntityType()->getDefaultAttributeSetId();

            // $attributeSetId = 21;
        
            $groupCollection = Mage::getResourceModel('eav/entity_attribute_group_collection')
                ->setAttributeSetFilter($setId)
                ->setSortOrder()
                ->load();

             $defaultGroupId = 0;
            foreach ($groupCollection as $group) {
                 if ($defaultGroupId == 0 or $group->getIsDefault()) {
                     $defaultGroupId = $group->getId();
                }

            }	

            foreach ($groupCollection as $group) {
                 $attributes = array();
                foreach ($salesmanAttributes as $attribute) {
                    if ($this->getSalesman()->checkInGroup($attribute->getId(),$setId, $group->getId())) {
                        $attributes[] = $attribute;
                    }
                }

                if (!$attributes) {
                    continue;
                }

                $active = $defaultGroupId == $group->getId();
                $block = $this->getLayout()->createBlock('salesman/adminhtml_salesman_edit_tab_attributes')
                     ->setGroup($group)
                    ->setAttributes($attributes)
                     ->setAddHiddenFields($active)
                    ->toHtml();
                $this->addTab('group_' . $group->getId(), array(
                    'label'     => Mage::helper('salesman')->__($group->getAttributeGroupName()),
                    'content'   => $block,
                    'active'    => $active
                ));
            }
        }
        else{
            $this->addTab('set', array(
                'label'     => Mage::helper('catalog')->__('Settings'),
                'content'   => $this->_translateHtml($this->getLayout()
                    ->createBlock('salesman/adminhtml_salesman_edit_tab_settings')->toHtml()),
                'active'    => true
            ));
        }

     return parent::_beforeToHtml();
    }

     protected function _translateHtml($html)
    {
        Mage::getSingleton('core/translate_inline')->processResponseBody($html);
        return $html;
    }
}
