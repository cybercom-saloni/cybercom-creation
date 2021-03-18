<?php
Mage::loadFileByClassName('Block_Core_Template');
/**
 * 
 */
class Block_Admin_Grid extends Block_Core_Template
{
	protected $admins=[];

	function __construct()
	{
		$this->setTemplate('./View/Admin/Grid.php');
	}

	public function setAdmins($admins=null)
	{
		if(!$admins){
			$admins=Mage::getModel('Model_Admin');
			$admins=$admins->fetchAll();
		}
		$this->admins=$admins;
		return $this;
	}

	public function getAdmins()
	{
		if(!$this->admins){
			$this->setAdmins();
		}
		return $this->admins;
	}
}