<?php
Mage::loadFileByClassName('Block_Core_Template');
class Block_Payment_Grid extends Block_Core_Template {
	protected $payments=[];

	public function __construct()
	{
		$this->setTemplate('./View/Payment/Grid.php');
	}

	
	public function setPayments($payments=null)
	{
		if(!$payments){
			$payment=Mage::getModel('Model_Payment');
			$payments=$payment->fetchAll();
		}
		$this->payments=$payments;
		return $this;
	}

	public function getPayments()
	{
		if(!$this->payments){
			$this->setPayments();
		}
		return $this->payments;
	}
}
?>