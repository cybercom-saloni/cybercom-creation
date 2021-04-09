<?php
namespace Model\Config;
class Group extends \Model\Core\Table
{
    function __construct()
    {
        $this->setTableName('config_group');
        $this->setPrimaryKey('groupId');
    }
}