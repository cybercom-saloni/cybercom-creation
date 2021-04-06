<?php
namespace Model;
class Shipment extends \Model\Core\Table{
	public function __construct(){
		$this->setTableName("shipment");
		$this->setPrimaryKey("shipmentId");
	}
}
?>