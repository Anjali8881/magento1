<?php

class Ccc_Order_Block_Adminhtml_Order_Customer extends Mage_Adminhtml_Block_Widget_Grid_Container {

	protected $cart;

	public function __construct() {
		parent::__construct();
		$this->_controller = 'adminhtml_order_customer';
		$this->_blockGroup = 'order';
		$this->_headerText = ('Create New Order');
		$this->_removeButton('add');
		$this->addButton('back', [
			'label' => 'Back',
			'onclick' => 'setLocation(\'' . $this->getUrl('*/adminhtml_order/index') . '\')',
			'class' => 'back',
		], 0, 1, 'header');
	}

	public function setCart(Ccc_Order_Model_Cart $cart) {
		$this->cart = $cart;
		return $this;
	}

	public function getCart() {
		if (!$this->cart) {
			return false;
		}
		return $this->cart;
	}

}