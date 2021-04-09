<?php
namespace Block\Admin\Shipment;
class  Edit extends \Block\Core\Template
{
	protected $shipment=null;
	protected $template=null;
	
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Shipment/Edit.php');
    }
	
    public function getShipment()
    {
    	if(!$this->shipment){
    		$this->setShipment();
    	}
    	return $this->shipment;
    }
     public function setShipment()
    {
    	if(!$this->shipment){
    		$shipment=\Mage::getModel('Shipment');
    		if($id=$this->getRequest()->getGet('shipmentId')){
    			$shipment=$shipment->load($id);
    		}
    	}
    	$this->shipment=$shipment;
    	return $this;	
    }
}
?>