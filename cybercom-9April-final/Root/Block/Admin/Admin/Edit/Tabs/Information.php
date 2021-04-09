<?php 
namespace Block\Admin\Admin\Edit\Tabs;
class Information extends \Block\Core\Template
{
	protected $admin=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Admin/Edit/Tabs/Information.php');
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
    		$admin=\Mage::getModel('Admin');
    		if($id=$this->getRequest()->getGet('adminId')){
    			$admin=$admin->load($id);
    		}
    	}
    	$this->admin=$admin;
    	return $this;	
    }
}
?>