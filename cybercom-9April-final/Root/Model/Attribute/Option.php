<?php
namespace \Model\Attribute;
class Option extends \Model\Core\Table
{
    function __construct()
	{
		$this->setTableName("attribute_option");
		$this->setPrimaryKey("optionId");
	}
}
