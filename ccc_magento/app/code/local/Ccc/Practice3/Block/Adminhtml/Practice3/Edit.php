<?php 
class Ccc_Practice3_Block_Adminhtml_Practice3_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

	public function __construct(){
		parent::__construct();
		$this->_controller = "adminhtml_practice3";
		$this->_blockGroup = "ccc_practice3";
		$this->_headerText = "Edit Practice3 Information"; 
	}
}
?>