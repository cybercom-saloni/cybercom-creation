<?php
Mage::loadFileByClassName('Block_Core_Template');
class Block_Product_Edit_Tabs_GroupPrice extends Block_Core_Template    
{
    protected $product=null;
    function __construct()
    {
        $this->setTemplate('./View/Product/Edit/Tabs/GroupPrice.php');
    }

    public function setProduct($product=null)
    {
        // $product=Mage::getModel('Model_Product');
        // $query="SELECT *
        //             FROM `product` 
        //             WHERE `productId`='{$this->getRequest()->getGet("productId")}'";
        //             // echo $query;
        // $product->fetchAll($query);
        // $this->product=$product;
        // return $this;
        if(!$product){
            $product=Mage::getModel('Model_Product');
            $productId=$this->getRequest()->getGet('productId');
            $product->load($productId);
        //    $query="SELECT *
        //                FROM `product` 
        //                WHERE `productId`='{$this->getRequest()->getGet('productId')}'";
        //    $product->fetchAll($query);
           }
           $this->product=$product;
           return $this;		
    }

    public function getProduct()
    {
        if(!$this->product){
    		$this->setProduct();
    	}
        return $this->product;
    }

    public function getCustomerGroup()
    {
        $id= $this->getRequest()->getGet('productId');
        
        $query="SELECT
                    cg.*,
                    pgp.entityId,
                    p.price,
                    pgp.price
            FROM `customer_group` cg
            LEFT JOIN `product_group_price` pgp
            ON pgp.customerGroupId = cg.groupId
            AND pgp.productId = {$id}
            LEFT JOIN `product` p ON p.productId = {$id}";
            
        $customerGroup=Mage::getModel('Model_customerGroup');
        $this->customerGroup=$customerGroup->fetchAll($query);
        return $this->customerGroup;
    }
}
?>