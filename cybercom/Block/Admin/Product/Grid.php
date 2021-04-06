<?php
namespace Block\Admin\Product;
class Grid extends \Block\Core\Template {
	protected $products=[];

	public function __construct()
	{
		$this->setTemplate('./View/Admin/Product/Grid.php');
	}
		
	public function setProducts($products=null)
	{
		if(!$products){
			$product=\Mage::getModel('Product');
			$products=$product->fetchAll();
		}
		$this->products=$products;
		return $this;
	}

	public function getProducts()
	{
		if(!$this->products){
			$this->setProducts();
		}
		return $this->products;
	}
}
