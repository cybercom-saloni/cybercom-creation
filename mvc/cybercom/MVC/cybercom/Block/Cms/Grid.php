<?php
Mage::loadFileByClassName('Block_Core_Template');
class Block_Cms_Grid extends Block_Core_Template
{
    protected $cms=null;

    public function __construct()
    {
        $this->setTemplate('./View/Cms/grid.php');
    }

    public function setCms($cms=null)
    {
        if(!$cms)
        {
            $cms=Mage::getModel('model_cms');
            $cms=$cms->fetchAll();
        }
        $this->cms=$cms;
        return $this;
    }

    public function getCms()
    {
        if(!$this->cms)
        {
            $this->setCms();
        }
        return $this->cms;
    }
}
?>