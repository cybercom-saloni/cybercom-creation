<?php
Mage::loadFileByClassName('Block_Core_Template');
class Block_Shipment_Grid extends Block_Core_Template {
	protected $shipments=[];

	public function __construct()
	{
		$this->setTemplate('./View/Shipment/Grid.php');
	}

	
	public function setShipments($shipments=null)
	{
		if(!$shipments){
			$shipment=Mage::getModel('Model_Shipment');
			$shipments=$shipment->fetchAll();
		}
		$this->shipments=$shipments;
		return $this;
	}

	public function getShipments()
	{
		if(!$this->shipments){
			$this->setShipments();
		}
		return $this->shipments;
	}
}
?>