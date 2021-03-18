<?php
class  Block_Shipment_Edit extends Block_Core_Template
{
	protected $shipment=null;
	protected $template=null;
	
    public function __construct()
    {
        $this->setTemplate('./View/Shipment/Edit.php');
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
    		$shipment=Mage::getModel('Model_Shipment');
    		if($id=$this->getRequest()->getGet('shipmentId')){
    			$shipment=$shipment->load($id);
    		}
    	}
    	$this->shipment=$shipment;
    	return $this;	
    }
}
?>