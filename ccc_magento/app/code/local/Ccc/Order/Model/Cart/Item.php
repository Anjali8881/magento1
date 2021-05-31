<?php

class Ccc_Order_Model_Cart_Item extends Mage_Core_Model_Abstract {

	protected $product = null;
	protected $cart = null;

	public function _construct() {
		$this->_init('order/cart_item');
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

	public function setProduct(Mage_Catalog_Model_Product $product) {
		$this->product = $product;
		return $this;
	}

	public function getProduct() {
		if (!$this->product) {
			return false;
		}
		$product = Mage::getModel('catalog/product')->load($this->product_id);
		$this->setProduct($product);
		return $this->product;
	}
}