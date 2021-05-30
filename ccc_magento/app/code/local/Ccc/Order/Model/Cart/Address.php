<?php

class Ccc_Order_Model_Cart_Address extends Mage_Core_Model_Abstract {

	protected $cart = null;

	public function _construct() {
		$this->_init('order/cart_address');
	}

	public function setCart(Ccc_Order_Model_Cart $cart) {
		$this->cart = $cart;
		return $this;
	}

	public function getCart() {
		if (!$this->cart) {
			return false;
		}
		$cart = Mage::getModel('order/cart')->load($this->cart_id);
		$this->setCart($cart);
		return $this->cart;
	}
}