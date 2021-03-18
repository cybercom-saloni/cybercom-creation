<?php
Mage::loadFileByClassName('Block_Core_Template');
class  Block_Product_Edit extends Block_Core_Template
{
	
    public function __construct()
    {
        $this->setTemplate('./View/Product/Edit.php');
    }

    // public function getTabs()
    // {
    //     $tabs=Mage::getBlock('Block_Product_Edit_Tabs')->getTabs();
    // }

    public function getTabContent()
    {
        $tabBlock=Mage::getBlock('Block_Product_Edit_Tabs');
        $tabs=$tabBlock->getTabs();
        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs))
        {
            return null;
        }
        $blockClassName=$tabs[$tab]['block'];
        $block=Mage::getBlock($blockClassName);
        echo $block->toHtml();
    }
	
    // public function getProduct()
    // {
    // 	if(!$this->product){
    // 		$this->setProduct();
    // 	}
    // 	return $this->product;
    // }
    //  public function setProduct()
    // {
    // 	if(!$this->product){
    // 		$product=Mage::getModel('Model_Product');
    // 		if($id=$this->getController()->getRequest()->getGet('productId')){
    // 			$product=$product->load($id);
    // 		}
    // 	}
    // 	$this->product=$product;
    // 	return $this;	
    // }
}?>