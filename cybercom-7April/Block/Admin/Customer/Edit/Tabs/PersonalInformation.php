<?php 
namespace  Block\Admin\Customer\Edit\Tabs;
class PersonalInformation extends \Block\Core\Template
{
	protected $customer=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Customer/Edit/Tabs/PersonalInformation.php');
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
    		$customer=\Mage::getModel('Customer');
    		if($id=$this->getRequest()->getGet('customerId')){
    			$customer=$customer->load($id);
    		}
    	}
    	$this->customer=$customer;
    	return $this;	
    }
}
?>