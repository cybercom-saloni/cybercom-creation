<?php
Mage::loadFileByClassName('Block_Core_Template');
/**
 * Block_Category_Grid
 */
class Block_Customer_Grid extends Block_Core_Template
{
	protected $customers=[];
	function __construct()
	{
		$this->setTemplate('./View/Customer/Grid.php');
	}

	public function setCustomers($customers=Null){
		if(!$customers){
			$customers=Mage::getModel('Model_Customer');
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