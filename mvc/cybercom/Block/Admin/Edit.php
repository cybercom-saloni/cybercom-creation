<?php
/**
 * Block_admin_Edit
 */
class Block_Admin_Edit extends Block_Core_Template
{
    protected $admin=null;
    
    function __construct()
    {
        $this->setTemplate('./View/Admin/Edit.php');
    }

    public function getTabContent()
    {
        $tabBlock=Mage::getBlock('Block_Admin_Edit_Tabs');
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