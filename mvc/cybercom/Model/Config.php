<?php
namespace Model;
class Config extends \Model\Core\Table
{
    function __construct()
    {
        $this->setTableName('config');
        $this->setPrimaryKey('configId');
    }
}