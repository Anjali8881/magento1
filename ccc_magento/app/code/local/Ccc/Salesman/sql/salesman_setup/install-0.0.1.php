<?php 
$installer = $this;
$installer->startSetup();

$installer->addEntityType(Ccc_Salesman_Model_Resource_Salesman::ENTITY,[
	'entity_model' => 'salesman/salesman',
	'attribute_model' => 'salesman/attribute',
	'table' => 'salesman/salesman',
	'increment_per_store' => '0',
	'additional_attribute_table' => 'salesman/eav_attribute',
	'entity_attribute_collection' => 'salesman/salesman_attribute_collection'
]);

$installer->createEntityTables('salesman');
$installer->installEntities();

$default_attribute_set_id = Mage::getModel('eav/entity_setup','core_setup')
							->getattributeSetId('salesman','Default');

$installer->run("UPDATE `eav_entity_type` SET `default_attribute_set_id` = {$default_attribute_set_id} WHERE 
	`entity_type_code` = 'salesman'");
$installer->endSetup();
?>