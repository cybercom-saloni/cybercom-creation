<?php 
Mage::loadFileByClassName('Model_Core_Table');
Mage::loadFileByClassName('Model_Core_Adapter');
class Model_Cms extends Model_Core_Table
{
	function __construct()
	{
		$this->setTableName("cms");
		$this->setPrimaryKey("pageId");
	}

}
 ?>