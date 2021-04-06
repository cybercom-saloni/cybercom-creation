<?php
namespace Block\Admin\Admin;
class Grid extends \Block\Core\Template
{
	protected $admins=[];

	function __construct()
	{
		$this->setTemplate('./View/Admin/Admin/Grid.php');
	}

	public function setAdmins($admins=null)
	{
		if(!$admins){
			$admins=\Mage::getModel('Admin');
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