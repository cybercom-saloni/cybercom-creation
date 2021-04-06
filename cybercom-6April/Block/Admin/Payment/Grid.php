<?php
namespace Block\Admin\Payment;
class Grid extends \Block\Core\Template {
	protected $payments=[];

	public function __construct()
	{
		$this->setTemplate('./View/Admin/Payment/Grid.php');
	}

	
	public function setPayments($payments=null)
	{
		if(!$payments){
			$payment=\Mage::getModel('Payment');
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