<?php
Mage::loadFileByClassName('Model_Core_Table');
Mage::loadFileByClassName('Model_Core_Adapter');
class Model_Product extends Model_Core_Table{
	public function __construct(){
		$this->setTableName("product");
		$this->setPrimaryKey("productId");
	}
}
?>