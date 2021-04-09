<?php 
namespace Block\Admin\CustomerGroup;
class Edit extends \Block\Core\Template
{
	protected $customerGroup=null;
    protected $template=null;
	
	function __construct()
	{
		$this->setTemplate('./View/Admin/CustomerGroup/Edit.php');
	}

	public function getTabContent()
	{
		$tabBlock=\Mage::getBlock('Admin\CustomerGroup\Edit\Tabs');
		$tabs=$tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getdefaultTab());
		if(!array_key_exists($tab, $tabs))
		{
			return null;
		}
		$blockClassName=$tabs[$tab]['block'];
		$block=\Mage::getBlock($blockClassName);
		echo $block->toHtml();
	}
}
?>