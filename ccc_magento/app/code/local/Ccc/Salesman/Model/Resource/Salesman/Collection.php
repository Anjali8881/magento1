<?php 
class Ccc_Salesman_Model_Resource_Salesman_Collection extends Mage_Catalog_Model_Resource_Collection_Abstract{

	public function __construct(){
		$this->setEntity('salesman');
		parent::__construct();
	}
}
?>