<?php
Mage::loadFileByClassName('Model_Core_Table');
Mage::loadFileByClassName('Model_Core_Adapter');
/**
 * 
 */
class Model_Admin extends Model_Core_Table
{
	
	function __construct()
	{
		$this->setTableName("admin");
		$this->setPrimaryKey("adminId");
	}
}