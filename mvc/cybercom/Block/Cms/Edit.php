<?php
Mage::getBlock('Block_Core_Template');
class Block_Cms_Edit extends Block_Core_Template
{
    public function __construct()
    {
        $this->setTemplate('./View/Cms/Edit.php');
    }

    public function getTabContent()
    {
        $tabBlock=Mage::getBlock('Block_Cms_Edit_Tabs');
        $tabs=$tabBlock->getTabs();
        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs))
        {
            return null;
        }
        $blockName=$tabs[$tab]['block'];
        echo Mage::getModel($blockName)->toHtml();
    }
}
?>