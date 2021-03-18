<?php 
/**
 * 
 */
class Block_Admin_Edit_Tabs_Information extends Block_Core_Template
{
	protected $admin=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Edit/Tabs/Information.php');
	}

	 public function getAdmin()
    {
    	if(!$this->admin){
    		$this->setAdmin();
    	}
    	return $this->admin;
    }
     public function setAdmin($admin=null)
    {
    	if(!$admin){
    		$admin=Mage::getModel('Model_Admin');
    		if($id=$this->getRequest()->getGet('adminId')){
    			$admin=$admin->load($id);
    		}
    	}
    	$this->admin=$admin;
    	return $this;	
    }
}
?>