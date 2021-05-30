<?php

class Ccc_Order_Block_Adminhtml_Order_Cart_Account extends Ccc_Order_Block_Adminhtml_Order_Cart {

	protected $cart = null;

	public function __construct() {
		parent::__construct();
	}

	public function setCart(Ccc_Order_Model_Cart $cart) {
		$this->cart = $cart;
		return $this;
	}

	public function getCart() {
		return $this->cart;
	}

	public function getCustomerName() {
		$customer = $this->getCart()->getCustomer();
		print_r($customer);
		//print_r($customer->getFirstname() . ' ' . $customer->getMiddlename() . ' ' . $customer->getLastname());
		die();
	}

	public function getCustomerEmail() {
		return $this->getCustomer()->getEmail();
	}
}