<?php
Mage::loadFileByClassName('Model_Core_Table');
Mage::loadFileByClassName('Model_Core_Adapter');
class Model_CustomerGroup extends Model_Core_Table{
	public function __construct()
	{
		$this->setTableName("customer_group");
		$this->setPrimaryKey("groupId");
	}
}
?>