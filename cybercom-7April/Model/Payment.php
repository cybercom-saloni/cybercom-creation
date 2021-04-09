<?php
namespace Model;
class Payment extends \Model\Core\Table{
	public function __construct(){
		$this->setTableName("payment");
		$this->setPrimaryKey("paymentId");
	}
}
?>