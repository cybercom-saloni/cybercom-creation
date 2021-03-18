<?php 
/**
 * 
 */
class Block_Admin_Edit_Tabs_Gallery extends Block_Core_Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Edit/Tabs/Gallery.php');
	}
}
?>