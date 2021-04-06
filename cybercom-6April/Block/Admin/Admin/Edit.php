<?php
namespace Block\Admin\Admin;
class Edit extends \Block\Core\Template
{
    protected $admin=null;
    
    function __construct()
    {
        $this->setTemplate('./View/Admin/Admin/Edit.php');
    }

    public function getTabContent()
    {
        $tabBlock=\Mage::getBlock('Admin\Admin\Edit\Tabs');
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