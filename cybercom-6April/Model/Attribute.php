<?php
namespace Model;
class Attribute extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTableName('attribute');
        $this->setPrimaryKey('attributeId');
    }

    public function getBackendTypeOption()
    {
        return [];
        
    }
}