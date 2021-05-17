<?php
class Ccc_Practice3_Block_Adminhtml_Practice3 extends Mage_Adminhtml_Block_Widget_Grid_Container {

	public function __construct() {
		parent::__construct();
		$this->_controller = 'adminhtml_practice3';
		$this->_blockGroup = "ccc_practice3";
		$this->_headerText = "Manage Practice 3";
	}
}
?>