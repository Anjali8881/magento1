<?php

class Ccc_Order_Block_Adminhtml_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	public function __construct() {
		parent::__construct();

	}

	protected function _getCollectionClass() {
		return 'order/order_collection';
	}

	protected function _prepareCollection() {
		$collection = Mage::getResourceModel($this->_getCollectionClass());
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _getCustomerName() {
		$customers = Mage::getResourceModel('customer/customer_collection');
		$customerModel = Mage::getModel('customer/customer');
		$customerData = [];

		foreach ($customers as $customer) {
			$customerModel->load($customer->getEntityId());
			$customerData[$customerModel->getId()] = $customerModel->getFirstname() . ' ' . $customerModel->getLastname();
		}
		// print_r($customerData);
		// die();

		return $customerData;
	}

	protected function _prepareColumns() {

		$this->addColumn('order_id', array(
			'header' => Mage::helper('order')->__('Order #'),
			'width' => '80px',
			'type' => 'text',
			'index' => 'order_id',
		));

		$this->addColumn('customer_name',
			[
				'header' => "Customer Name",
				'index' => 'customer_name',
			]
		);

		$this->addColumn('total', array(
			'header' => Mage::helper('order')->__('Grand Total'),
			'index' => 'total',
		));

		$this->addColumn('shipment_code', array(
			'header' => Mage::helper('order')->__('Shipment Code'),
			'index' => 'shipment_code',
		));

		$this->addColumn('payment_code', array(
			'header' => Mage::helper('order')->__('Payment Code'),
			'index' => 'payment_code',
		));

		// if (Mage::getSingleton('admin/session')->isAllowed('order/order/actions/view')) {
		// 	$this->addColumn('action',
		// 		array(
		// 			'header' => Mage::helper('order')->__('Action'),
		// 			'width' => '50px',
		// 			'type' => 'action',
		// 			'getter' => 'getId',
		// 			'actions' => array(
		// 				array(
		// 					'caption' => Mage::helper('order')->__('View'),
		// 					'url' => array('base' => '*/order_order/view'),
		// 					'field' => 'order_id',
		// 					'data-column' => 'action',
		// 				),
		// 			),
		// 			'filter' => false,
		// 			'sortable' => false,
		// 			'index' => 'stores',
		// 			'is_system' => true,
		// 		));
		// }
		$this->addRssList('rss/order/new', Mage::helper('order')->__('New Order RSS'));

		$this->addExportType('*/*/exportCsv', Mage::helper('order')->__('CSV'));
		$this->addExportType('*/*/exportExcel', Mage::helper('order')->__('Excel XML'));
		return parent::_prepareColumns();
	}

	// public function getRowUrl($row) {
	// 	return $this->getUrl('*/adminhtml_order/view', array('order_id' => $row->getId()));
	// }

	public function getGridUrl() {
		return $this->getUrl('*/*/', array('_current' => true));
	}

}
