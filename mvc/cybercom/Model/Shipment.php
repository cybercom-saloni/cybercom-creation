<?php
Mage::loadFileByClassName('Model_Core_Table');
Mage::loadFileByClassName('Model_Core_Adapter');
class Model_Shipment extends Model_Core_Table{
	public function __construct(){
		$this->setTableName("shipment");
		$this->setPrimaryKey("shipmentId");
	}
}
?>