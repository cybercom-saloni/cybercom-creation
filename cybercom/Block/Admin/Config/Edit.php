<?php
namespace Block\Admin\Config;
class Edit extends \Block\Core\Template
{
    protected $config=null;
    protected $template=null;
    
    function __construct()
    {
        $this->setTemplate('./View/Admin/Config/Edit.php');
    }

    public function getTabContent()
    {
        $tabBlock=\Mage::getBlock('Admin\Config\Edit\Tab');
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