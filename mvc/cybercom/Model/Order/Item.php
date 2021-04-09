<?php
namespace Model\Order;
class Item extends \Model\Core\Table{
	public function __construct(){
		$this->setTableName("order_item");
		$this->setPrimaryKey("orderItemId");
	}

	public  function getProductName()
	{
		return \Mage::getModel('product')->load($this->productId)->name;
	}

	public  function getProductPrice()
	{
		return \Mage::getModel('product')->load($this->productId)->price;
	}
}