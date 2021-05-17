<?php
class Ccc_Practice3_Block_Adminhtml_Practice3_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	public function __construct() {
		parent::__construct();
	}

	protected function _getCollectionClass() {
		return "ccc_practice3/practice3_collection";
	}

	public function _prepareCollection() {
		$collection = Mage::getResourceModel($this->_getCollectionClass());
		$this->setCollection($collection);
		parent::_prepareCollection();
	}

	protected function _prepareColumns() {
		$this->addColumn('practice3_id', [
			'header' => 'ID',
			'index' => 'practice3_id',
			'width' => '50px',
		]);

		$this->addColumn('title', [
			'header' => 'Title',
			'index' => 'title',
		]);

		$this->addColumn('status', [
			'header' => 'Status',
			'index' => 'status',
			'type' => 'options',
			'options' => [
				1 => 'Active',
				0 => 'Inactive',
			],
		]);

		$this->addColumn('created_time', [
			'header' => 'Created_Time',
			'index' => 'created_time',
			'type' => 'date',
			'default' => '-',
			'width' => '120px',
			'format' => 'Y-m-d H:i:s',
		]);

		$this->addColumn('updated_time', [
			'header' => 'Updated_Time',
			'index' => 'updated_time',
			'type' => 'date',
			'default' => '-',
			'width' => '120px',
			'format' => 'Y-m-d H:i:s',
		]);

		return parent::_prepareColumns();
	}

	public function getRowUrl($row) {
		return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
	}
}
?>