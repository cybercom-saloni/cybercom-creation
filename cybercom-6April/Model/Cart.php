<?php
namespace Model;
class Cart extends \Model\Core\Table
{
    protected $customer = null;
    protected $customers = null;
    protected $items = null;
    protected $billingAddress = null;
    protected $shippingAddress = null;
    protected $payment= null;
    protected $shipment= null;
    protected $shippingAmount=null;

    public function __construct()
    {
        $this->setTableName('cart');
        $this->setPrimaryKey('cartId');
    }
    
    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer()
    {
        if($this->customer)
        {
            return $this->customer;
        }

        if(!$this->customerId)
        {
            return false;
        }

        $customer = \Mage::getModel('Customer')->load($this->customerId);
        $this->setCustomer($customer);
        return $this->customer;
    }

    public function setCustomers(\Model\Customer\Collection $customers)
    {
        $this->customers = $customers;
        return $this;
    }

    public function getcustomers()
    {
        $customers = \Mage::getModel('customer')->fetchAll();
        $this->setcustomers($customers);
        return $this->customers;
    }

    public function setItems(\Model\Cart\Item\Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    public function getItems()
    {
        if(!$this->cartId)
        {
            return false;
        }

        $query = "SELECT *
        FROM `cart_item`
        WHERE `cartId` = {$this->cartId}";
        $items = \Mage::getModel('Cart\Item')->fetchAll($query);
        $this->setItems($items);
        return $items;
    }
    
    public function setBillingAddress(\Model\Cart\Address $address)
    {
        $this->billingAddress = $address;
        return $this;
    }
    
    public function getBillingAddress()
    {
        if(!$this->cartId)
        {
            return false;
        }
        $query="SELECT * FROM `cart_address` WHERE `addressType`='billing' AND cartId={$this->cartId}";
        $billingAddress=\Mage::getModel('cart\address')->fetchRow($query);
        if(!$billingAddress)
        {
            return false;
        }
        $this->setBillingAddress($billingAddress);
        return $this->billingAddress;
    }

    public function setShippingAddress(\Model\Cart\Address $address)
    {
        $this->shippingAddress = $address;
        return $this;
    }

    public function getShippingAddress()
    {
        if(!$this->cartId)
        {
            return false;
        }
        $query="SELECT * FROM `cart_address` WHERE `addressType`='shipping' AND cartId={$this->cartId}";
        $shippingAddress=\Mage::getModel('cart\address')->fetchRow($query);
        if(!$shippingAddress)
        {
            return false;
        }
        $this->setShippingAddress($shippingAddress);
        return $this->shippingAddress;
    }

    public function setPayment(\Model\Payment $payment)
    {
        $this->Payment = $payment;
        return $this;
    }

    public function getPayment()
    {
        if($this->payment)
        {
            return $this->payment;
        }
        if(!$this->paymentId)
        {
            return false;
        }
        $payment = \Mage::getModel('Payment')->load($paymentId);
        $this->setPayment($payment);
        return $this->payment;
    }

    public function setShipment(\Model\Shipment $shipment)
    {
        $this->shipment = $shipment;
        return $this;
    }
    public function getShipment()
    {
        if($this->shipment)
        {
            return $this->shipment;
        }
        if(!$this->shipmentId)
        {
            return false;
        }
        $shipment = \Mage::getModel('Shipment')->load($shipmentId);
        $this->setShipment($shipment);
        return $this->shipment;
    }
    public function addItemToCart($product,$quantity=1,$addMode=false)
    {
        $query = "SELECT * FROM `cart_item` WHERE `cartId` = '{$this->cartId}' AND `productId` = '{$product->productId}'";
        $cartItem = \Mage::getModel('Cart\Item');
        $cartItem = $cartItem->fetchRow($query);
        if($cartItem)
        {
            $cartItem->quantity += $quantity;
            $cartItem->save();
            return true;
        }
        $cartItem=\Mage::getModel('Cart\Item');
        $cartItem->cartId = $this->cartId;
        $cartItem->productId = $product->productId;
        $cartItem->price = $product->price;
        $cartItem->quantity = $quantity;
        $cartItem->discount = $product->discount * $quantity;
        $cartItem->save();
    }
    
    public function setShippingAmount(\Model\Shipment\Collection $shippingAmount)
    {
        $this->shippingAmount = $shippingAmount;
        return $this;
    }

    public function getshippingAmount()
    {
        $shippingAmount = \Mage::getModel('Shipment')->fetchAll();
        $this->setshippingAmount($shippingAmount);
        $shippingMethodId=$this->shippingMethodId;
        $query="SELECT * FROM `shipment` WHERE `shipmentId`={$shippingMethodId}";
        // echo $query;
        $shipmentAmt = \Mage::getModel('Shipment')->fetchRow($query);
        $shipmentAmt=$shipmentAmt->amount;
        return $shipmentAmt;
    }

    public function getTotal()
    {
        
    }
}