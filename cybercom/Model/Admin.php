<?php
namespace Model;
class Admin extends Core\Table
{
	function __construct()
	{
		$this->setTableName("admin");
		$this->setPrimaryKey("adminId");
	}
}