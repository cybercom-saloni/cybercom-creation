<?php
namespace Block\Admin\Shipment;
\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template {
	protected $shipments=[];

	public function __construct()
	{
		$this->setTemplate('./View/Admin/Shipment/Grid.php');
	}

	
	public function setShipments($shipments=null)
	{
		if(!$shipments){
			$shipment=\Mage::getModel('Shipment');
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