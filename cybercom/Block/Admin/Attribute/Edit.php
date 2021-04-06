<?php
namespace Block\Admin\Attribute;
class Edit extends \Block\Core\Template
{
	protected $attribute=null;
	protected $template=null;
	
	function __construct()
	{
		$this->setTemplate('./View/Admin/Attribute/Edit.php');
	}

	public function getTabContent()
    {
        $tabBlock=\Mage::getBlock('Admin\Attribute\Edit\Tabs');
        $tabs=$tabBlock->getTabs();
        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs))
        {
            return null;
        }
        $blockClassName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClassName);
        echo $block->toHtml();
    }
}
?>