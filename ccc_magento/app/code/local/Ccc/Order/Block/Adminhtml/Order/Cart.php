<?php

class Ccc_Order_Block_Adminhtml_Order_Cart extends Mage_Core_Block_Template {

	protected $cart = null;

	public function __construct() {
		parent::__construct();
	}

	public function getBackUrl() {
		return $this->getUrl('*/*/customerGrid');
	}

	public function getSaveUrl() {
		return $this->getUrl('*/*/placeOrder', array('_current' => true));
	}

	public function setCart(Ccc_Order_Model_Cart $cart) {
		$this->cart = $cart;
		return $this;
	}

	public function getCart() {
		return Mage::registry('cart');
	}

	public function _getCart() {
		return $this->cart;
	}

}