<?php
namespace Controller\Admin;
class Cart extends \Controller\Core\Admin
{
    public function addToCartAction()
    {
        try
        {
            $productId = (int)$this->getRequest()->getGet('productId');
            $product = \Mage::getModel('Product')->load($productId);
            if(!$product)
            {
                $this->getMessage()->setFailure('Product is not valid');
            }
            $cart=$this->getCart();
            $cart->addItemToCart($product,1,true);
            $this->getMessage()->setSuccess('Item successfully added');
        }
        catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index'); 
    }

    protected function getCart($customerId=null)
    {
        $cart=\Mage::getModel('cart');
        $session=\Mage::getModel('Admin\Session');
        if($customerId)
        {
            $session->customerId = $customerId;
        }
        if((!$customerId) && (!$session->customerId))
        {
            return $cart;
        }
        $query = "SELECT * FROM `{$cart->getTableName()}` WHERE customerId = '{$session->customerId}'";
        $cart = $cart->fetchRow($query);
        if($cart)
        {
            return $cart;
        }
        $cart = \Mage::getModel('cart');
        $cart->customerId = $customerId;
        date_default_timezone_set('Asia/Calcutta'); 
        $cart->createdDate = date("Y-m-d H:i:s");
        $cart->save();
        return $cart;
    }
    

    public function indexAction()
    {
        $grid = \Mage::getBlock('Admin\Cart\Grid');
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($grid,'grid'); 
        $cart=$this->getCart();
        $grid->setCart($cart);
        echo $layout->toHtml();
    }

    public function updateAction()
    {
        try {
            $quanities = $this->getRequest()->getPost('quantity');
            $cart = $this->getCart();
            foreach($quanities as $cartItemId => $quanity)
            {
                $cartItem = \Mage::getModel('Cart\Item')->load($cartItemId);
                $cartItem->quantity = $quanity;
                $cartItem->save();
            }
        } catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index');
    }

    public function deleteAction()
    {
        try
        {
            $cartItemId=$this->getRequest()->getGet('cartItemId');
            if(!$cartItemId)
            {
                $this->getMessage()->setFailure("Wrong Cart Id Provided");
            }
            
            $cartItem=\Mage::getModel('cart\Item');
            if(!$cartItem->delete($cartItemId))
            {
                $this->getMessage()->setFailure('Unable to delete the record');
            }
            else
            {
                $cartItem->delete($cartItemId);
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }
        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index',null,null,true);
    } 
    
    public function selectCustomerAction()
    {
        $customerId = $this->getRequest()->getPost('customer');
        $cart=$this->getCart($customerId);
        $this->redirect('index');
    }

    public function selectAddressAction()
    {
        echo "<pre>";
        $billing = $this->getRequest()->getPost('billing');
        $shipping = $this->getRequest()->getPost('shipping');
        $payment = $this->getRequest()->getPost('payments');  
        $shipment = $this->getRequest()->getPost('shipments');
        $cartId=$this->getCart()->cartId;
        $query = "SELECT * FROM `cart` Where `cartId` = '{$cartId}'";
        $cart = \Mage::getModel('Cart')->fetchRow($query);
        $cart->paymentMethodId = $payment;
         $cart->shippingMethodId = $shipment;
        $cart->save();
         $this->setTotal();
        $cartId=$this->getCart()->getItems()->getData()[0]->cartId;
        if($billing)
        {
           $query = "SELECT *
            FROM `cart_address`
             WHERE `cartId`='{$cartId}'
               AND `addressType`='billing'";
           $billingAddress = \Mage::getModel('Cart\Address')->fetchRow($query);
           if(!$billingAddress)
           {
               $billingAddress = \Mage::getModel('cart\Address');
           }
            $billingAddress->cartId=$cartId;
            $billingAddress->addressType='billing';
            $billingAddress->sameAsBilling=0;
            $billingAddress->setData($billing);
            
            if(array_key_exists('saveInAddressBook',$billing))
            {
                $customerId = $this->getCart()->customerId;
                $query = "SELECT *
                 FROM `customer_address`
                 WHERE `customerId`={$customerId}
                    AND `addressType`='billing'";
                 echo $query;
                $billingAddress = \Mage::getModel('Customer\Address')->fetchRow($query);
                $billingAddressId=$billingAddress->addressId;
              
                if(!$billingAddress)
                {
                    $billingAddress = \Mage::getModel('Customer\Address');
                }
                $billingAddress->customerId = $customerId;
                $billingAddress->addressType='billing';
                $billingAddress->setData($billing);
                $query = "SELECT * FROM `cart_address` 
                WHERE `cartId` = '{$cartId}' 
                AND `addressType`='billing'";
                $cartAddressId = \Mage::getModel('Cart\Address')->fetchRow($query);
                $cartAddressId->addressId = $billingAddressId;
                $cartAddressId->save();
            }
          
            if($billingAddress->save())
            {
                $this->getMessage()->setSuccess('Billing Address Save');
            }
            else
            {
                $this->getMessage()->setFailure('Billing Not Address Save');
            }
            
            
        }
        if($shipping)
        {
            $query = "SELECT * 
            FROM `cart_address` 
            WHERE `cartId` = {$cartId}
            AND `addressType`='shipping'";
            $shippingAddress = \Mage::getModel('Cart\Address')->fetchRow($query);
            if(!$shippingAddress)
            {
                $shippingAddress = \Mage::getModel('Cart\Address');
            }
            
            $shippingAddress->cartId=$cartId;
            $shippingAddress->addressType='shipping';
            $shippingAddress->sameAsBilling=0;
            $shippingAddress->setData($shipping);
            if(array_key_exists('sameAsBilling',$shipping))
            {
               
                echo "<br>";
                $query = "SELECT * 
                FROM `cart_address` 
                WHERE `cartId` = {$cartId}
                    AND `addressType`='shipping'";
                    // echo $query;
                $shippingAddress = \Mage::getModel('cart\Address')->fetchRow($query);
                if(!$shippingAddress)
                {
                    $shippingAddress = \Mage::getModel('cart\Address');   
                }
                $cartAddressId = $shippingAddress->cartAddressId;
                $shippingAddress->cartId=$cartId;
                $shippingAddress->addressType='shipping';
                $shippingAddress->sameAsBilling=1;
                $shippingAddress->setData($billing);
            }

            if(array_key_exists('saveInAddressBook',$shipping))
            {

                $customerId=$this->getCart()->customerId;
                $query="SELECT *
                 FROM `customer_address` 
                 WHERE `customerId`='{$customerId}'
                    AND `addressType`='shipping'";
                    // echo $query;
                $shippingAddress = \Mage::getModel('Customer\Address')->fetchRow($query);
                $shippingAddressId=$shippingAddress->addressId;

                if(!$shippingAddress)
                {
                    $shippingAddress = \Mage::getModel('customer\Address');
                }
                $shippingAddress->customerId=$customerId;
                $shippingAddress->addressType='shipping';
                $shippingAddress->setData($shipping);
                $addressId = $shippingAddress->addressId;
                $query = "SELECT * FROM `cart_address` 
                WHERE `cartId` = '{$cartId}' 
                AND `addressType`='shipping'";
                $cartAddressId = \Mage::getModel('Cart\Address')->fetchRow($query);
                // print_r($cartAddressId);
                $cartAddressId->addressId = $shippingAddressId;
                $cartAddressId->save();
            }
            

            if($shippingAddress->save())
            {
                $this->getMessage()->setSuccess('Updated');
            }
            else
            {
                $this->getMessage()->setFailure('Not Save');
            }
        }
       $this->redirect('index');
    }

    public function setTotal()
    {
        $total=0;
        $cartId=$this->getCart()->cartId;
        $query = "SELECT * FROM `cart` WHERE `cartId`={$cartId}";
        //echo $query;
        $cart = \Mage::getModel('cart')->fetchRow($query);
        $shippingQuery="SELECT * FROM `cart` 
        JOIN `shipment`
         on `shipment`.`shipmentId`=`cart`.`shippingMethodId` 
        WHERE `cartId`={$cartId}";
        $shippingAmount=\Mage::getModel('Cart')->fetchRow($shippingQuery);
    //   echo $shippingQuery;
        $cartItemQuery = "SELECT * FROM `cart_item` Where `cartId` = '{$cartId}'";
        $cartItem  = \Mage::getModel('Cart\Item')->fetchAll($cartItemQuery);
        echo "<br><pre>";
        // print_r($shippingAmount);
        foreach ($cartItem->getData() as $key =>$item)
        {
            $price = $item->price * $item->quantity;
            $total = $total + $price;
        }
        $cart->shippingAmount=$shippingAmount->amount;
        $total=$total+$shippingAmount->amount;
        $cart->total = $total;
       $cart->save();

    //    print_r($this->getCart());
    }

    public function placeOrderAction()
    {
        $cart = $this->getCart();
        $this->getOrder();
        $cartId=$cart->cartId;
        echo $customerId=$cart->customerId;
        
        $order = \Mage::getModel('order');
       $order->customerId = $cart->customerId;
       $order->total = $cart->total;
      $order->discount = $cart->discount;
       $order->paymentMethodId = $cart->paymentMethodId;
      $order->shippingMethodId = $cart->shippingMethodId;
      $order->shippingAmount = $cart->shippingAmount;
      date_default_timezone_set("Asia/Calcutta"); 
        $order->createdDate = date("Y-m-d H:i:s");
         $order->save();

         $query = "SELECT * FROM `orders` WHERE customerId = '{$cart->customerId}'";
        $cart = $cart->fetchRow($query);
        $orderId=$cart->orderId;
          $orderAddressShipping = \Mage::getModel('Order\Address');
          $customerId = $cart->customerId;
          $query = "SELECT * FROM `cart_address`
           WHERE `cartId`={$cartId} 
            AND `addressType`='shipping'";
        //  echo $query;
         $shippingAddress = \Mage::getModel('cart\Address')->fetchRow($query);
         $orderAddressShipping->orderId=$orderId;
         $orderAddressShipping->addressId = $shippingAddress->addressId;
         $orderAddressShipping->city = $shippingAddress->city;
         $orderAddressShipping->state = $shippingAddress->state;
         $orderAddressShipping->country = $shippingAddress->country;
         $orderAddressShipping->address = $shippingAddress->address;
         $orderAddressShipping->zipCode = $shippingAddress->zipCode;
         $orderAddressShipping->sameAsBilling = $shippingAddress->sameAsBilling;
         $orderAddressShipping->addressType = $shippingAddress->addressType;
         date_default_timezone_set("Asia/Calcutta"); 
         $orderAddressShipping->createdDate = date("Y-m-d H:i:s");;
        $orderAddressShipping->save(); 
       
          $orderAddressbilling = \Mage::getModel('Order\Address');
          $customerId = $cart->customerId;
          $query = "SELECT * FROM `cart_address`
           WHERE `cartId`={$cartId} 
            AND `addressType`='billing'";
        //  echo $query;
         $billingAddress = \Mage::getModel('cart\Address')->fetchRow($query);
         $orderAddressbilling->orderId=$orderId;
         $orderAddressbilling->addressId = $billingAddress->addressId;
         $orderAddressbilling->city = $billingAddress->city;
         $orderAddressbilling->state = $billingAddress->state;
         $orderAddressbilling->country = $billingAddress->country;
         $orderAddressbilling->address = $billingAddress->address;
         $orderAddressbilling->zipCode = $billingAddress->zipCode;
         $orderAddressbilling->sameAsBilling = $billingAddress->sameAsBilling;
         $orderAddressbilling->addressType = $billingAddress->addressType;
         date_default_timezone_set("Asia/Calcutta"); 
         $orderAddressbilling->createdDate = date("Y-m-d H:i:s");
        $orderAddressbilling->save();  

        $query="SELECT * FROM `cart_item` WHERE `cartId`={$cartId}";
        // echo $query;
        $orderquery="SELECT * FROM `order_item` WHERE `orderId`={$orderId}";
        $cartItem = \Mage::getModel('cart\Item')->fetchAll($query);
        foreach($cartItem->getData() as $key=>$item)
        {
            $orderItem = \Mage::getModel('order\Item');
            $orderItem->price = $item->price;
            $orderItem->orderId = $orderId;
            $orderItem->productId = $item->productId;
            $orderItem->basePrice = $item->basePrice;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->price;
            $orderItem->discount = $item->discount;
            date_default_timezone_set("Asia/Calcutta"); 
            $orderItem->createdDate = date("Y-m-d H:i:s");
            $orderItem->save();
        }
        $cartItemDeleteQuery="SELECT * FROM cart_address WHERE cartId={$cartId}";
        $cartAddressDelete = \Mage::getModel('cart\Address')->fetchRow($cartItemDeleteQuery);
        $cartAddressDeleteId = $cartAddressDelete->cartItemId;
        $cartAddressDelete->delete($cartAddressDeleteId);

        $cartAddressDeleteQuery="SELECT * FROM cart_address WHERE cartId={$cartId} AND addressType='billing'";
        // echo $cartAddressDeleteQuery;
        $cartAddressDelete = \Mage::getModel('cart\Address')->fetchRow($cartAddressDeleteQuery);
        // print_r($cartAddressDelete);
        $cartAddressDeleteId = $cartAddressDelete->cartAddressId;
        $cartAddressDelete->delete($cartAddressDeleteId);

         $cartAddressDeleteQuery="SELECT * FROM cart_address WHERE cartId={$cartId} AND addressType='shipping'";
        // echo $cartAddressDeleteQuery;
        $cartAddressDelete = \Mage::getModel('cart\Address')->fetchRow($cartAddressDeleteQuery);
        // print_r($cartAddressDelete);
        $cartAddressDeleteId = $cartAddressDelete->cartAddressId;
        $cartAddressDelete->delete($cartAddressDeleteId);

        $cartDeleteQuery="SELECT * FROM cart WHERE cartId={$cartId}";
        // echo $cartDeleteQuery;
        $cartDelete = \Mage::getModel('cart')->fetchRow($cartDeleteQuery);
        // /print_r($cartDelete);
        $cartDeleteId = $cartDelete->cartId;
        $cartDelete->delete($cartDeleteId);
        
        $this->redirect('Checkout','Checkout',['orderId'=>$orderId]);
    }

    public function getOrder()
    {
        $cart = $this->getCart();
        $query = "SELECT * FROM `orders` WHERE customerId = '{$cart->customerId}'";
        $order = \Mage::getModel('order')->fetchRow($query);
        $orderId=$order->orderId;
        return $orderId;
    }
    
}