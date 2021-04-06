<?php
namespace Block\Admin\Customer;
class Grid extends \Block\Core\Template
{
	protected $customers=[];
	function __construct()
	{
		$this->setTemplate('./View/Admin/Customer/Grid.php');
	}

	public function setCustomers($customers=Null){
		if(!$customers){
			$customers=\Mage::getModel('Customer');
			$customers=$customers->fetchAll();
		}
		$this->customers=$customers;
		return $this;
	}

	public function getCustomers()
	{
		if(!$this->customers){
			$this->setCustomers();
		}
		return $this->customers;
	}
}
?>