<?php 
/**
 * 
 */
class Block_Customer_Edit_Tabs_PersonalInformation extends Block_Core_Template
{
	protected $customer=null;

	function __construct()
	{
		$this->setTemplate('./View/Customer/Edit/Tabs/PersonalInformation.php');
	}

	 public function getCustomer()
    {
    	if(!$this->customer){
    		$this->setCustomer();
    	}
    	return $this->customer;
    }
     public function setCustomer($customer=null)
    {
    	if(!$customer){
    		$customer=Mage::getModel('Model_Customer');
    		if($id=$this->getRequest()->getGet('customerId')){
    			$customer=$customer->load($id);
    		}
    	}
    	$this->customer=$customer;
    	return $this;	
    }
}
?>