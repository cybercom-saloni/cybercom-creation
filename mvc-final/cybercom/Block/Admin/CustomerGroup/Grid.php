<?php 
namespace Block\Admin\CustomerGroup;
class Grid extends \Block\Core\Template
{
	protected $customerGroups=[];
	function __construct()
	{
		$this->setTemplate('./View/Admin/customerGroup/Grid.php');
	}

	public function setCustomerGroups($customerGroups=null)
	{
		if(!$customerGroups)
		{
			$customerGroups=\Mage::getModel('CustomerGroup');
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