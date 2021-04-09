<?php
namespace Model\Customer;
class Address extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('addressId');
        $this->setTableName('customer_address');
    }
}
?>