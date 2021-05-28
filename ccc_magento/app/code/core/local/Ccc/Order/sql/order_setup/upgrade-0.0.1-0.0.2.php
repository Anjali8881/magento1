<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('order/cart_item'))
	->addColumn(
		'item_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
		'Item Id'
	)
	->addColumn(
		'cart_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('nullable' => false),
		'Cart Id'
	)
	->addColumn(
		'product_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('nullable' => false),
		'Product Id'
	)
	->addColumn(
		'quantity',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('nullable' => false, 'default' => '1'),
		'Quantity'
	)
	->addColumn(
		'base_price',
		Varien_Db_Ddl_Table::TYPE_FLOAT,
		32,
		array('nullable' => false),
		'Base Price'
	)
	->addColumn(
		'price',
		Varien_Db_Ddl_Table::TYPE_FLOAT,
		32,
		array('nullable' => false),
		'Price'
	)
	->addColumn(
		'discount',
		Varien_Db_Ddl_Table::TYPE_FLOAT,
		32,
		array('nullable' => false, 'default' => '0'),
		'Discount'
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