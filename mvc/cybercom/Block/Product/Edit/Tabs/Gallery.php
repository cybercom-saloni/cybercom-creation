<?php 
/**
 * 
 */
class Block_Product_Edit_Tabs_Gallery extends Block_Core_Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Product/Edit/Tabs/Gallery.php');
	}
}
?>