<?php
namespace Model;
class Order extends \Model\Core\Table{
	protected $product=null;

	public function __construct(){
		$this->setTableName("orders");
		$this->setPrimaryKey("orderId");
	}

	public  function getCustomer()
    {
       $order = $this->getOrder();
	   $customerId=$order->customerId;
	   $query="SELECT * FROM `customer` WHERE customerId={$customerId}";
        return \Mage::getModel('customer')->fetchRow($query);
    }

	public function getCustomerBillingAddress()
    {
        $orderId=$this->orderId;
        $query="SELECT * FROM `order_address` WHERE orderId={$orderId} AND addressType='billing'";
        return \Mage::getModel('order\Address')->fetchRow($query);
    }

	public function getCustomerShippingAddress()
    {
        $orderId=$this->orderId;
        $query="SELECT * FROM `order_address` WHERE orderId={$orderId} AND addressType='shipping'";
        return \Mage::getModel('order\Address')->fetchRow($query);
    }

	public function getOrder()
    {
        $orderId=$this->orderId;
        $query="SELECT * FROM `orders` WHERE orderId={$orderId}";
        return \Mage::getModel('order')->fetchRow($query);
    }

	// public  function getProduct()
    // {
    //    $order = $this->getOrder();
	//    $orderItem = $this->getOrderItem();
	//    echo '<pre>';
	// 	print_r($orderItem);
	// 	// die();
	//    $product=\Mage::getModel('product');
	//    foreach($orderItem->getData() as $key =>$item)
	//    {
	// 	   $productId=$item->productId;
	// 	   $query="SELECT * FROM `product` WHERE productId={$productId}";
	//    	   $product=$product->fetchRow($query);
			
			
			
	//    }

		
	//    print_r($product);
	//    die();
	//    return $product;
	// }

	

	public function getOrderItem()
    {
        $orderId=$this->orderId;
        $query="SELECT * FROM `order_item` WHERE orderId={$orderId}";
        return \Mage::getModel('order\item')->fetchAll($query);
    }

	public function getShipping()
	{
		$order=$this->getOrder();
		$shippingId=$order->shippingMethodId;
		$query="SELECT * FROM `shipment` WHERE shipmentId={$shippingId}";
        return \Mage::getModel('shipment')->fetchRow($query);
	}
	public function getPayment()
	{
		$order=$this->getOrder();
		$paymentId=$order->paymentMethodId;
		$query="SELECT * FROM `payment` WHERE paymentId={$paymentId}";
        return \Mage::getModel('payment')->fetchRow($query);
	}
}
