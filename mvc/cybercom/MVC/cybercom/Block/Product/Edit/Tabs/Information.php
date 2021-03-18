<?php 
class Block_Product_Edit_Tabs_Information extends Block_Core_Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Product/Edit/Tabs/Information.php');
	}

	 public function getProduct()
    {
    	if(!$this->product){
    		$this->setProduct();
    	}
    	return $this->product;
    }
     public function setProduct($product=null)
    {
    	if(!$product){
    		$product=Mage::getModel('Model_Product');
    		if($id=$this->getRequest()->getGet('productId')){
    			$product=$product->load($id);
    		}
    	}
    	$this->product=$product;
    	return $this;	
    }
}
?>