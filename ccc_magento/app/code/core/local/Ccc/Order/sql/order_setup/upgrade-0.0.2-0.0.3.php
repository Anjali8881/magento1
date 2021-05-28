<?php
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('order/cart_address'))
	->addColumn(
		'address_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER, 10,
		array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
		'Address Id'
	)
	->addColumn(
		'cart_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		10,
		array('nullable' => false),
		'Cart Id'
	)
	->addColumn(
		'address_type',
		Varien_Db_Ddl_Table::TYPE_VARCHAR,
		32,
		array('nullable' => false),
		'Address Type'
	)
	->addColumn(
		'address',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		128,
		array('nullable' => false),
		'Address'
	)
	->addColumn(
		'city',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		128,
		array('nullable' => false),
		'City'
	)
	->addColumn(
		'state',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		128,
		array('nullable' => false),
		'State'
	)
	->addColumn(
		'country',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		128,
		array('nullable' => false),
		'Country'
	)
	->addColumn(
		'zipcode',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		128,
		array('nullable' => false),
		'Zipcode'
	)
	->addColumn(
		'same_as_billing',
		Varien_Db_Ddl_Table::TYPE_BOOLEAN,
		2,
		array('nullable' => false, 'default' => '0'),
		'Same As Billing'
	)
	->addColumn(
		'first_name',
		Varien_Db_Ddl_Table::TYPE_VARCHAR, 30,
		array('nullable' => false),
		'First Name'
	)
	->addColumn(
		'last_name',
		Varien_Db_Ddl_Table::TYPE_VARCHAR, 30,
		array('nullable' => false),
		'Last Name'
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