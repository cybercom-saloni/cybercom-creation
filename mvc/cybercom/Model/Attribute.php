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
        return [
            'varchar'=>'varchar',
            'int'=>'int',
            'decimal'=>'decimal',
            'text'=>'text'
        ];
    }

    public function getInputTypeOption()
    {
        return [
            'text'=>'textbox',
            'textarea'=>'textarea',
            'select'=>'select',
            'checkbox'=>'checkbox',
            'radio'=>'radio'
        ];
    }

    public  function getEntityIdOption()
    {
        return [
            'product'=>'product',
            'category'=>'category'
        ];
    }

    public function getOptions()
    {  
        return \Mage::getModel($this->backendModel)->setAttribute($this)->getOptions();  
    }
}