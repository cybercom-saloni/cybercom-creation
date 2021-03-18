<?php
Mage::loadFileByClassName('Model_Core_Table');
class Model_Product_Group_Price extends Model_Core_Table
{
    public function __construct()
    {
       $this->setTableName('product_group_price');
       $this->setPrimaryKey('entityId');
    }
}
?>