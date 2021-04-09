<?php
namespace Block\Admin\Config;
class Grid extends \Block\Core\Template
{
    protected $configGroup=null;

    function __construct()
    {
        $this->setTemplate('./View/Admin/Config/Grid.php');
    }

    public function getConfigGroups()
    {
       if(!$this->configGroup)
       {
           $this->setConfigGroups();
       }
        return $this->configGroup;
    }
    
    public  function setConfigGroups($configGroup=null)
    {
        if(!$configGroup)
        {
            $configGroup = \Mage::getModel('config\Group')->fetchAll();
        }
       $this->configGroup=$configGroup;
       return $this;
    }
}