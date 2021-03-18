<?php 
Mage::loadFileByClassName('Model_Core_Table');
Mage::loadFileByClassName('Model_Core_Adapter');
/**
 * 
 */
class Model_Customer extends Model_Core_Table
{
	
	function __construct()
	{
		$this->setTableName("customer");
		$this->setPrimaryKey("customerId");
	}
}
 ?>