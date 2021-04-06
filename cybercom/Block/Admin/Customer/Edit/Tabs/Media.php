<?php 
namespace Block\Admin\Customer\Edit\Tabs;
class Media extends \Block\Core\Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Customer/Edit/Tabs/Media.php');
	}
}
?>