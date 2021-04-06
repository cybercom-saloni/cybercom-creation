<?php
namespace Model;
class CustomerGroup extends \Model\Core\Table{
	public function __construct()
	{
		$this->setTableName("customer_group");
		$this->setPrimaryKey("groupId");
	}
}
?>