<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
	
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Product/Edit.php');
    }

    public function getTabContent()
    {
        $tabBlock=\Mage::getBlock('Admin\Product\Edit\Tabs');
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
