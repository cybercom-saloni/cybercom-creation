<?php
/**
 * Block_Category_Edit
 */
class Block_Category_Edit extends Block_Core_Template
{
	protected $category=null;
	protected $template=null;
	
	function __construct()
	{
		$this->setTemplate('./View/Category/Edit.php');
	}

	public function getTabContent()
    {
        $tabBlock=Mage::getBlock('Block_Category_Edit_Tabs');
        $tabs=$tabBlock->getTabs();
        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs))
        {
            return null;
        }
        $blockClassName=$tabs[$tab]['block'];
        $block=Mage::getBlock($blockClassName);
        echo $block->toHtml();
    }
}
?>