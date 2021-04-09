<?php 
namespace BLock\Admin\Category\Edit\Tabs;
class Gallery extends \Block\Core\Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Category/Edit/Tabs/Gallery.php');
	}
}
?>