<?php 
/**
 * 
 */
class Block_Category_Edit_Tabs_Gallery extends Block_Core_Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Category/Edit/Tabs/Gallery.php');
	}
}
?>