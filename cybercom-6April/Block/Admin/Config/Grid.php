<?php
namespace Block\Admin\Config;
class Grid extends \Block\Core\Template
{
    protected $config=null;

    public function __construct()
    {
        $this->setTemplate('./View/Admin/Config/Grid.php');
    }

    public function setConfigs($config=null)
    {
        if(!$config)
        {
            $config=\Mage::getModel('config');
            $config=$config->fetchAll();
        }
        $this->config=$config;
        return $this;
    }

    public function getConfigs()
    {
        if(!$this->config)
        {
            $this->setConfigs();
        }
        return $this->config;
    }
}
?>