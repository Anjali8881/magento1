<?php

class Ccc_Order_Model_Order extends Mage_Core_Model_Abstract {

	protected $customer = null;

	protected function _construct() {
		$this->_init('order/order');
	}

	public function setCustomer(Mage_Customer_Model_Customer $customer) {
		$this->customer = $customer;
		return $this;
	}

	public function getCustomer() {
		if ($this->customer) {
			return $this->customer;
		}
		$customer = Mage::getModel('customer/customer')->load($this->customer_id);
		print_r($customer);
		die();
		$this->setCustomer($customer);
		return $this->customer;
	}

}

?>