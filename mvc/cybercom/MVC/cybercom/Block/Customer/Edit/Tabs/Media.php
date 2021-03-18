<?php 
/**
 * 
 */
class Block_Customer_Edit_Tabs_Media extends Block_Core_Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Customer/Edit/Tabs/Media.php');
	}
}
?>