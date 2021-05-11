<?php 
class Ccc_Salesman_Model_Resource_Salesman extends Mage_Eav_Model_Entity_Abstract{

	const ENTITY = 'salesman';

	public function __construct(){
		$this->setType(self::ENTITY)
			 ->setConnection('core_read','core_write');

		parent::__construct();
	}
}
?>