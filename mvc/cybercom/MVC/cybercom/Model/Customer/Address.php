<?php
Mage::loadFileByClassName('Model_Core_Table');
class Model_Customer_Address extends Model_Core_Table
{
    public function __construct()
    {
        $this->setPrimaryKey('addressId');
        $this->setTableName('customer_address');
    }
}
?>