<?php
namespace Block\Admin\Cart;
class Checkout extends \Block\Core\Template
{
    protected $cart = null;
    function __construct()
    {
        $this->setTemplate('./View/Admin/Cart/Checkout.php');
    }
    // public function setOrder(\Model\Order $cart)
    // {
    //     $this->cart = $cart;
    //     return $this;
    // }

    public function getOrder()
    {
        $orderId=$this->getRequest()->getGet('orderId');
        $query="SELECT * FROM `orders` WHERE orderId={$orderId}";
        return \Mage::getModel('order')->fetchRow($query);
    }

}