<?php
namespace Model;
class Order extends \Model\Core\Table{
	public function __construct(){
		$this->setTableName("orders");
		$this->setPrimaryKey("orderId");
	}
}