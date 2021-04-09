<?php
namespace Block\Admin\Config;
class Edit extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Config/Edit.php');
    }

    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Admin\Config\Edit\Tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs))
        {
            return null;
        }

        $blockName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockName)->toHtml();
    }
}