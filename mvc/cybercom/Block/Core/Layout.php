<?php
// Mage::loadFileByClassName('Controller_Core_Admin');
Mage::loadFileByClassName('Block_Core_Layout_Content');
Mage::loadFileByClassName('Block_Core_Layout_Header');
class Block_Core_Layout extends Block_Core_Template{
	

	public function __construct()
	{
        // var_dump($controller);
        $this->setTemplate('./View/Core/Layout/OneColumn.php');
        $this->prepareChildren();
	}
    
   
    public function prepareChildren()
    {
    	$this->addChild(Mage::getBlock('Block_Core_Layout_Content'),'content');
        $this->addChild(Mage::getBlock('Block_Core_Layout_Header'),'header');
        // $this->addChild(Mage::getBlock('Block_Product_Form_Tab'),'left');
         $left = Mage::getBlock('block_core_layout_left');
              $this->addChild($left,'leftTab');
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