<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * Header
 */
class Header extends \Block\Core\Template
{
	function __construct()
	{
		$this->setTemplate("./View/Core/Layout/Header.php");
	}
}
?>