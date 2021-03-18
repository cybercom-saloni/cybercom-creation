<?php 
Mage::loadFileByClassName('Model_Core_Session');
/**
 * 
 */
class Model_Admin_Session extends Model_Core_Session
{
	
	function __construct()
	{
		parent::__construct();
		$this->setNameSpace('Admin');
		$_SESSION[$this->getNameSpace()]['init']='';
	}
}
 ?>