<?php 
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
		->newTable($installer->getTable('ccc_practice3/practice3'))
		->addColumn('practice3_id',
			Varien_Db_Ddl_Table::TYPE_INTEGER,null,[
				'identity' => true,
				'primary' => true,
				'nullable' => false
			],'ID'
		)
		->addColumn('title',
			Varien_Db_Ddl_Table::TYPE_TEXT,null,[
				'nullable' => false
			],'Title'
		)
		->addColumn('status',
			Varien_Db_Ddl_Table::TYPE_SMALLINT,null,[
				'nullable' => false
			],'status'
		)
		->addColumn('created_time',
			Varien_Db_Ddl_Table::TYPE_TIMESTAMP,null,[
				'nullable' => true
			],'created_time'
		)
		->addColumn('updated_time',
			Varien_Db_Ddl_Table::TYPE_TIMESTAMP,null,[
				'nullable' => true
			],'updated_time'
		);
$installer->getConnection()->createTable($table);
$installer->endSetup();
?>