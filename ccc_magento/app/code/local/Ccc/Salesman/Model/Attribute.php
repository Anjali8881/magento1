<?php 
class Ccc_Salesman_Model_Attribute extends Mage_Eav_Model_Attribute{

	const MODULE_NAME = 'Ccc_Salesman';
	protected $_eventObject = 'attribute';

	protected function _construct(){
		$this->_init('salesman/attribute');
	}
}
?>