<?php 
Mage::loadFileByClassName('Block_Core_Template');
/**
 * 
 */
class BLock_CustomerGroup_Grid extends Block_Core_Template
{
	protected $customerGroups=[];
	function __construct()
	{
		$this->setTemplate('./View/customerGroup/Grid.php');
	}

	public function setCustomerGroups($customerGroups=null)
	{
		if(!$customerGroups)
		{
			$customerGroups=Mage::getModel('Model_CustomerGroup');
			$customerGroups=$customerGroups->fetchAll();
		}
		$this->customerGroups=$customerGroups;
		return $this;
	}

	public function getCustomerGroups()
	{
		if(!$this->customerGroups){
			$this->setCustomerGroups();
		}
		return $this->customerGroups;
	}

}
?>