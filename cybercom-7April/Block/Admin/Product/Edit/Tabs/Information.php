<?php 
namespace Block\Admin\Product\Edit\Tabs;
class Information extends \Block\Core\Template
{
	protected $product=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Product/Edit/Tabs/Information.php');
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
    		$product=\Mage::getModel('Product');
    		if($id=$this->getRequest()->getGet('productId')){
    			$product=$product->load($id);
    		}
    	}
    	$this->product=$product;
    	return $this;	
    }
}
?>