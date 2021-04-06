<?php
namespace Model;
class Attribute extends Core\Table
{
    public function __construct()
    {
        $this->setTableName('attribute');
        $this->setPrimaryKey('attributeId');
    }
}