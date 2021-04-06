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
                if(!$billingAddress)
                {
                    $billingAddress = \Mage::getModel('Customer\Address');
                }
                $billingAddress->customerId = $customerId;
                $billingAddress->addressType='billing';
                $billingAddress->setData($billing);
            }
            if(array_key_exists('payment',$billing))
            {
                $cartId = $this->getCart()->cartId;
                $query = "SELECT * FROM `cart` Where `cartId` = '{$cartId}'";
                $cart = \Mage::getModel('Cart')->fetchRow($query);
                // print_r($cart);
                // echo $billing->payment;
                // $cart->shippingMethodId = $billing;
                
            }
            if(array_key_exists('shipment',$billing))
            {
                echo "<BR>".'hello';
                die();
            }
            if($billingAddress->save())
            {
                echo 111;
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
                    echo $query;
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
                // echo $shippingAddress=$shippingAddress[0];
                echo '<pre>';
                // print_r($shippingAddress);
                // $addressId=array_shift($shippingAddress);
                echo $addressId;
                if(!$shippingAddress)
                {
                    $shippingAddress = \Mage::getModel('customer\Address');
                }
                $shippingAddress->customerId=$customerId;
                $shippingAddress->addressType='shipping';
                $shippingAddress->setData($shipping);
                $addressId = $shippingAddress->addressId;
                echo '<br>'.'4444'.'<br>';
                $query = "SELECT * FROM `cart_address` 
                WHERE `cartId` = '{$cartId}' 
                AND `addressType`='shipping'";
                $cartAddressId = \Mage::getModel('Cart\Address')->fetchRow($query);
                // print_r($cartAddressId);
                $cartAddressId->addressId = '2';
                $cartAddressId->save();
            }
            

            if($shippingAddress->save())
            {
                $this->getMessage()->setSuccess('Address Save');
            }
            else
            {
                $this->getMessage()->setFailure('Address Not Save');
            }
        }
          $this->redirect('index');
    }

    public function paymentAction()
    {
        $payment = $this->getRequest()->getPost('payments');
        $shipment = $this->getRequest()->getPost('shipments');
        $cartId=$this->getCart()->cartId;
        $query = "SELECT * FROM `cart` Where `cartId` = '{$cartId}'";
        $cart = \Mage::getModel('Cart')->fetchRow($query);
        $cart->paymentMethodId = $payment;
         $cart->shippingMethodId = $shipment;
        $cart->save();
        // $this->redirect('index');
    }
}