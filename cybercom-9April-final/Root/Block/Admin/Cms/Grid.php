<?php
namespace Block\Admin\Cms;
class Grid extends \Block\Core\Template
{
    protected $cms=null;

    public function __construct()
    {
        $this->setTemplate('./View/Admin/Cms/grid.php');
    }

    public function setCms($cms=null)
    {
        if(!$cms)
        {
            $cms=\Mage::getModel('cms');
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