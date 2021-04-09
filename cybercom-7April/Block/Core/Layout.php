<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\Core\Layout\Content');
\Mage::loadFileByClassName('Block\Core\Layout\Left');
\Mage::loadFileByClassName('Block\Core\Layout\Header');
\Mage::loadFileByClassName('Block\Core\Layout\Footer');
class Layout extends \Block\Core\Template{
	

	public function __construct()
	{
        $this->setTemplate('./View/Core/Layout/OneColumn.php');
        $this->prepareChildren();
	}
    
   
    public function prepareChildren()
    {
    	$this->addChild(\Mage::getBlock('Core\Layout\Content'),'content');
       $this->addChild(\Mage::getBlock('Core\Layout\Header'),'header');
       $left = \Mage::getBlock('core\layout\left');
       $this->addChild($left,'leftTab');
       $this->addChild(\Mage::getBlock('Core\Layout\Footer'),'footer');
    }

     public function getContent()
       {
              return $this->getChild('content');
       }
       public function getLeft()
       {
              return $this->getChild('leftTab');
       }

}
?>