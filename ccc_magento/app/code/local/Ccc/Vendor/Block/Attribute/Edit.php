<?php
class Ccc_Vendor_Block_Attribute_Edit extends Mage_Core_Block_Template {

	public function __construct() {
		$this->getGroup();
	}

	public function getGroup() {
		$groupModel = Mage::getResourceModel('vendor/group_collection')->addFieldToFilter('entity_id', ['eq' => Mage::getSingleton('vendor/session')->getId()]);
		$this->setCollection($groupModel);
	}

	protected function _prepareLayout() {
		$this->setChild('delete_button',
			$this->getLayout()->createBlock('adminhtml/widget_button')
				->setData(array(
					'label' => Mage::helper('eav')->__('Delete'),
					'class' => 'delete delete-option',
				)));

		$this->setChild('add_button',
			$this->getLayout()->createBlock('adminhtml/widget_button')
				->setData(array(
					'label' => Mage::helper('eav')->__('Add Option'),
					'class' => 'add',
					'id' => 'add_new_option_button',
				)));
		return parent::_prepareLayout();
	}

	public function getBackUrl() {
		return $this->getUrl('vendor/attribute/grid');
	}

	public function getDeleteButtonHtml() {
		return $this->getChildHtml('delete_button');
	}

	public function getAddNewButtonHtml() {
		return $this->getChildHtml('add_button');
	}

	public function getSaveUrl() {
		return $this->getUrl('vendor/attribute/save', ['attribute_id' => $this->getRequest()->getParam('attribute_id')]);
	}

	public function getAttribute() {
		return Mage::registry('entity_attribute');
	}

	public function getAttributeObject() {
		if (null === $this->_attribute) {
			return Mage::registry('entity_attribute');
		}
		return Mage::getModel("ccc_vendor/resource_vendor_eav_attribute")
			->setEntityTypeId($this->getEntityTypeId());
	}

	public function getAttributeGroup() {
		$group = Mage::getResourceModel('vendor/group');
		$adapter = $group->getReadConnection();
		$select = $adapter->select()
			->from('eav_attribute_group', array('attribute_group_id'))
			->joinLeft('eav_attribute_set',
				'eav_attribute_set.attribute_set_id
                = eav_attribute_group.attribute_set_id')
			->joinLeft('eav_entity_attribute',
				'eav_entity_attribute.attribute_group_id
                = eav_attribute_group.attribute_group_id')
			->joinLeft('eav_attribute',
				'eav_attribute.attribute_id
                = eav_entity_attribute.attribute_id')
			->where("eav_attribute.attribute_id = {$this->getRequest()->getParam('attribute_id', 0)}");

		$groupId = $adapter->fetchOne($select);
		return $groupId;
	}

}
?>