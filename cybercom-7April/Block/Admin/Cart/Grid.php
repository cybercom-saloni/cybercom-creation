<?php
namespace Block\Admin\Cart;
class Grid extends \Block\Core\Template
{
    protected $cart = null;
    function __construct()
    {
        $this->setTemplate('./View/Admin/Cart/Grid.php');
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        try {
            if(!$this->cart)
            {
                $this->getMessage()->setFailure('CART IS EMPTY');
            }
            return $this->cart;
        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
       }

    }

    public function getCartBillingAddress()
    {
        $cartBillingAddress=$this->getCart()->getBillingAddress();
        if($cartBillingAddress)
        {

            return $cartBillingAddress;
        }
        $customerBillingAddress=$this->getCart()->getCustomer();
        if($customerBillingAddress)
        {
            $customerBillingAddress=$this->getCart()->getCustomer()->getCustomerbillingAddress();
         }
        //  $customerBillingAddress = $customerBillingAddress->getCustomerbillingAddress();
        return $customerBillingAddress;
    }

    public function getCartShippingAddress()
    {
        $cartShippingAddress=$this->getCart()->getShippingAddress();
        if($cartShippingAddress)
        {
            return $cartShippingAddress;
        }
        $customerShippingAddress=$this->getCart()->getCustomer();
        if($customerShippingAddress)
        {
            $customerShippingAddress=$this->getCart()->getCustomer()->getCustomerShippingAddress();
        }
        // $customerShippingAddress=$customerShippingAddress->getCustomerShippingAddress();
        return $customerShippingAddress;
    }

    public function getCartPayment()
    {
           return \Mage::getModel('payment')->fetchAll();
    }
    public function getCartShipment()
    {
        return \Mage::getModel('shipment')->fetchAll();
    }
    public function getShipmentAmount()
    {
        return \Mage::getModel('shipment');
    }

    public function getShipmentId()
    {
        
       return $this->getCart()->shippingMethodId;
    }
}
