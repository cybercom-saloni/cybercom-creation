<?php 
namespace  Model;
class Cms extends \Model\Core\Table
{
	function __construct()
	{
		$this->setTableName("cms");
		$this->setPrimaryKey("pageId");
	}

}
 ?>