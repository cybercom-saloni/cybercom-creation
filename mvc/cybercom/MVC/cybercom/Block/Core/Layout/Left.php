<?php
Mage::loadFileByClassName('Block_Core_Template');
/**
 * 
 */
class Block_Core_Layout_Left extends Block_Core_Template
{
	
	function __construct()
	{
		$this->setTemplate("./View/Core/Layout/Left.php");
	}
}
?>

