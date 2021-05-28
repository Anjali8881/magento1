<?php

class Ccc_Order_Block_Adminhtml_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	public function __construct() {
		parent::__construct();
	}

	protected function _prepareCollection() {
		$collection = Mage::getModel('order/order')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareColumns() {
		$this->addColumn('order_id', array(
			'header' => Mage::helper('order')->__('OrderId'),
			'width' => '80px',
			'type' => 'text',
			'index' => 'order_id',
		));
		$this->addColumn('customer_name', array(
			'header' => Mage::helper('order')->__('Customer Name'),
			'width' => '80px',
			'type' => 'text',
			'index' => 'customer_name',
		));
		$this->addColumn('total', array(
			'header' => Mage::helper('order')->__('Grand Total'),
			'width' => '80px',
			'type' => 'text',
			'index' => 'total',
		));
		$this->addColumn('shipping_method_code', array(
			'header' => Mage::helper('order')->__('Shipping Method Code'),
			'width' => '80px',
			'type' => 'text',
			'index' => 'shipping_method_code',
		));

		return parent::_prepareColumns();
	}
}