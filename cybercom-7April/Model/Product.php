<?php
namespace Model;
class Product extends \Model\Core\Table{
	public function __construct(){
		$this->setTableName("product");
		$this->setPrimaryKey("productId");
	}
}
