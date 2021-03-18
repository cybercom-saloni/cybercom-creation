<?php
Mage::loadFileByClassName('Block_Core_Template');
/**
 * Header
 */
class Block_Core_Layout_Header extends Block_Core_Template
{
	function __construct()
	{
		$this->setTemplate("./View/Core/Layout/Header.php");
	}
}
?>