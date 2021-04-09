<?php
namespace Controller\Admin;
class User extends \Controller\Core\Admin
{
    public function testAction()
    {
        $product = \Mage::getModel('Product');
        $query="SELECT * FROM  `product` 
                ORDER BY `productId` ASC";
        $product=$product->load(1);
        $product->name='abc';
        $product->sku='#abc';
        echo "<pre>";
        print_r($product);
    }
}