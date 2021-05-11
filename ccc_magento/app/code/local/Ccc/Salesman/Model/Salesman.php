<?php 
class Ccc_Salesman_Model_Salesman extends Mage_Core_Model_Abstract{

	const ENTITY = 'salesman';

	protected function _construct(){
		parent::_construct();
		$this->_init('salesman/salesman');
	}

	protected $_attributes;

	public function getAttributes(){
		if($this->_attributes == null){
			$this->_attributes = $this->_getResource()
				 ->loadAllAttributes($this)
				 ->getsortedAttributes();
		}
		return $this->_attributes;
	}

	public function checkInGroup($attributeId,$setId,$groupId){
		$resource = Mage::getSingleton('core/resource');

		$readConnection = $resource->getConnection('core_read');
		$readConnection = $resource->getConnection('core_read');

		$query = 'SELECT * FROM '.
		$resource->getTableName('eav/entity_attribute')
		. ' WHERE `attribute_id` ='.$attributeId
		. ' AND `attribute_group_id` ='.$groupId
		. ' AND `attribute_set_id` ='.$setId
		;
		
		$results = $readConnection->fetchRow($query);

		if($results){
			return true;
		}
		return false;
	}
}
?>