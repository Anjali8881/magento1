<?php
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('order/order'))
	->addColumn(
		'order_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
		'order Id'
	)
	->addColumn(
		'customer_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('nullable' => false),
		'Customer Id'
	)
	->addColumn(
		'total',
		Varien_Db_Ddl_Table::TYPE_FLOAT,
		32,
		array('nullable' => false, 'default' => '0'),
		'Total'
	)
	->addColumn(
		'discount',
		Varien_Db_Ddl_Table::TYPE_FLOAT,
		32,
		array('nullable' => false, 'default' => '0'),
		'Discount'
	)
	->addColumn(
		'quantity',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('nullable' => false, 'default' => '0'),
		'Quantity'
	)
	->addColumn(
		'customer_name',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		255,
		array('nullable' => false),
		'Customer Name'
	)
	->addColumn(
		'shipping_amount',
		Varien_Db_Ddl_Table::TYPE_FLOAT,
		32,
		array('nullable' => false, 'default' => '0'),
		'Shipping Amount'
	)
	->addColumn(
		'shipping_method_code',
		Varien_Db_Ddl_Table::TYPE_VARCHAR,
		64,
		array('nullable' => true, 'default' => null),
		'Shipping Method Code'
	)
	->addColumn(
		'payment_method_code',
		Varien_Db_Ddl_Table::TYPE_VARCHAR,
		64,
		array('nullable' => true, 'default' => null),
		'Payment Method Code'
	)
	->addColumn(
		'comment',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		255,
		array('nullable' => true, 'default' => null),
		'Comment'
	)
	->addColumn(
		'created_date',
		Varien_Db_Ddl_Table::TYPE_DATETIME,
		10,
		array('nullable' => false),
		'Created Date'
	);
$installer->getConnection()->createTable($table);

$installer->endSetup();

?>