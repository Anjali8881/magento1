<?php 
class Ccc_Salesman_Block_Adminhtml_Salesman_Grid extends Mage_Adminhtml_Block_Widget_Grid{

	public function __construct(){
		parent::__construct();
	}

	protected function _getStore(){
		$storeId = (int) $this->getRequest()->getParam('store',0);
		return Mage::app()->getStore($storeId);
	}

	protected function _prepareCollection(){
		$store = $this->_getStore();

		$collection = Mage::getModel('salesman/salesman')->getCollection()
					 ->addAttributeToSelect('firstname')
					 ->addAttributeToSelect('lastname')
					 ->addAttributeToSelect('email')
					 ->addAttributeToSelect('phoneNo');

		$adminStore = Mage_Core_Model_App::ADMIN_STORE_ID;
		$collection ->joinAttribute(
			'firstname',
			'salesman/firstname',
			'entity_id',
			null,
			'inner',
			$adminStore
		);

		$collection->joinAttribute(
			'lastname',
			'salesman/lastname',
			'entity_id',
			null,
			'inner',
			$adminStore
		);

		$collection->joinAttribute(
			'email',
			'salesman/email',
			'entity_id',
			null,
			'inner',
			$adminStore
		);

		$collection->joinAttribute(
			'phoneNo',
			'salesman/phoneNo',
			'entity_id',
		null,
		'inner',
		$adminStore
		);

		$collection->joinAttribute(
			'id',
			'salesman/entity_id',
			'entity_id',
			null,
			'inner',
			$adminStore
		);
		$this->setcollection($collection);
		parent::_prepareCollection();
		return $this;
	}

	protected function _prepareColumns(){
		$this->addColumn('id',[
			'header' => Mage::helper('salesman')->__('id'),
			'width' => '50px',
			'index' => 'id'
		]);

		$this->addColumn('firstname',[
			'header' => Mage::helper('salesman')->__('First Name'),
			'width' => '50px',
			'index' => 'firstname'
		]);

		$this->addColumn('lastname',[
			'header' => Mage::helper('salesman')->__('Last Name'),
			'width' => '50px',
			'index' => 'lastname'
		]);

		$this->addColumn('email',[
			'header' => Mage::helper('salesman')->__('Email'),
			'width' => '50px',
			'index' => 'email'
		]);

		$this->addColumn('phoneNo',[
			'header' => Mage::helper('salesman')->__('Phone No'),
			'width' => '50px',
			'index' => 'phoneNo'
		]);

		$this->addColumn('action',[
			'header' => Mage::helper('salesman')->__('Action'),
			'width' => '50px',
			'type' => 'action',
			'getter' => 'getId',
			'actions' => [
				[
					'caption' => Mage::helper('salesman')->__('Delete'),
					'url' => [
						'base' => '*/*/delete'
					],
					'field' => 'id',
				],
			],
			'filer' => false,
			'sortable' => false
		]);

		parent::_prepareColumns();
		return $this;
	}

	public function getGridUrl(){
		return $this->getUrl('*/*/index',array('_current' => true));
	}

	public function getRowUrl($row){
		return $this->getUrl('*/*/edit',[
			'store' => $this->getRequest()->getParam('store'),
			'id' => $row->getId()
		]);
	}
}
?>