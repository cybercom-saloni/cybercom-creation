<?php 
/**
 * 
 */
class Block_CustomerGroup_Edit extends Block_Core_Template
{
	protected $customerGroup=null;
    protected $template=null;
	
	function __construct()
	{
		$this->setTemplate('./View/CustomerGroup/Edit.php');
	}

	public function getTabContent()
	{
		$tabBlock=Mage::getBlock('Block_CustomerGroup_Edit_Tabs');
		$tabs=$tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getdefaultTab());
		if(!array_key_exists($tab, $tabs))
		{
			return null;
		}
		$blockClassName=$tabs[$tab]['block'];
		$block=Mage::getBlock($blockClassName);
		echo $block->toHtml();
	}
}
?>