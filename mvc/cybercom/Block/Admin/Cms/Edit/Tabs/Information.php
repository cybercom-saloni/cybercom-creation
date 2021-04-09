<?php
namespace Block\Admin\Cms\Edit\Tabs;
class Information extends \Block\Core\Template
{
    protected $cms=null;

    public function __construct()
    {
        $this->setTemplate('./View/Admin/Cms/Edit/Tabs/Information.php');
    }

    public function setCms($cms=null)
    {
        if(!$cms)
        {
            $cms=\Mage::getModel('Cms');
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