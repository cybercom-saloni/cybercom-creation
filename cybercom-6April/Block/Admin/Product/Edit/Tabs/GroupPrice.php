<?php
namespace Block\Admin\Product\Edit\Tabs;
class GroupPrice extends \Block\Core\Template    
{
    protected $product=null;
    function __construct()
    {
        $this->setTemplate('./View/Admin/Product/Edit/Tabs/GroupPrice.php');
    }

    public function setProduct($product=null)
    {
        if(!$product){
            $product=\Mage::getModel('Product');
            $productId=$this->getRequest()->getGet('productId');
            $product->load($productId);
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
            
        $customerGroup=\Mage::getModel('customerGroup');
        $this->customerGroup=$customerGroup->fetchAll($query);
        return $this->customerGroup;
    }
}
?>