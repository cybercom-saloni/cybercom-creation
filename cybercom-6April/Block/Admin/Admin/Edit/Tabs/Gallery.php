<?php 
namespace Block\Admin\Admin\Edit\Tabs;
class Gallery extends \Block\Core\Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Admin/Edit/Tabs/Gallery.php');
	}
}
?>