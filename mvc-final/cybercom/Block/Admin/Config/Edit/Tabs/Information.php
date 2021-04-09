<?php
namespace Block\Admin\Config\Edit\Tabs;
class Information extends \Block\Core\Template
{
    protected $configGroup = null;
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Config/Edit/Tabs/Information.php');
    }

    public function setConfigGroup($configGroup=null)
    {
        if(!$configGroup)
        {
            $configGroup = \Mage::getModel('config\Group');
            if($id=$this->getRequest()->getGet('configGroupId'))
            {
                $configGroup = $configGroup->load($id);
            }
            $this->configGroup = $configGroup;
            return $this;
        }
    }

    public function getConfigGroup()
    {
        if(!$this->configGroup)
        {
            $this->setConfigGroup();
        }  
        return $this->configGroup;     
    }
}