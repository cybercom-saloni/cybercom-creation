<?php
namespace Block\Admin\Config\Edit\Tabs;
class Configuration extends \Block\Core\Template
{
    protected $config = null;

    function __construct()
    {
        $this->setTemplate('./View/Admin/Config/Edit/Tabs/Configuration.php');
    }

    public function getConfig()
    {
        if(!$this->config)
        {
            $this->setConfig();
        }
        return $this->config;
    }

    public function setConfig($config=null)
    {
        if(!$config)
        {
            $config = \Mage::getModel('config');
            if($id=$this->getRequest()->getGet('configGroupId')){
                $query = "SELECT * FROM config WHERE groupId={$id}";
    			$config=$config->fetchAll($query);
    		}
        }
        $this->config=$config;
        return $this;
    }
}