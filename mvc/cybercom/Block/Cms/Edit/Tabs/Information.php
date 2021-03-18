<?php
Mage::getBlock('Block_Core_Template');
class Block_Cms_Edit_Tabs_Information extends Block_Core_Template
{
    protected $cms=null;

    public function __construct()
    {
        $this->setTemplate('./View/Cms/Edit/Tabs/Information.php');
    }

    public function setCms($cms=null)
    {
        if(!$cms)
        {
            $cms=Mage::getModel('Model_Cms');
            if($id=$this->getRequest()->getGet('pageId'))
            {
                $cms=$cms->load($id);
                if(!$cms)
                {
                    return null;
                }
            }
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