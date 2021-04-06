<?php
namespace Controller\Admin;
Class Order extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try{   
            $grid = \Mage::getBlock('Admin\Order\Grid');
            $layout=  \Mage::getBlock('Core\Layout');
            $content=$layout->getChild('content');
            $content->addChild($grid,'grid');
            echo $layout->toHtml();
        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
          }
    }

    protected function getCart($customerId=null)
    {
        $session = \Mage::getModel('Admin\Session');
        
        if ($customerId) {
            $session->customerId = $customerId;
        }
        //$sessionId = \Mage::getModel('Admin\Session')->getId();
        $cart = \Mage::getModel('Cart');
        $query = "SELECT * FROM `cart` WHERE `customerId` = '{$session->customerId}'";
        $cart = $cart->fetchRow($query);
        
        if($cart) {
          return $cart;
        }

        $cart = \Mage::getModel('Cart');
        $cart->customerId = $session->customerId;
        $cart->createddate = date('Y-m-d H:i:s');
        $cart->save();
        return $cart; 
    }
    public function orderAction(Type $var = null)
    {
        $cartId = $this->getRequest()->getGet('cartId');
        $order = \Mage::getModel('Order');
        $orderAddress = \Mage::getModel('Order\Address');
        $orderItem = \Mage::getModel('Order\Item');
        echo "<pre>";
        if ($order) {
            $this->setOrder($order,$cartId);
        }
        if ($orderItem) {
            $this->setOrderItem($orderItem);
        }
        if ($orderAddress) {
            $this->setOrderAddress($orderAddress);
        }
    }
    protected function setOrder(\Model\Order $order,$cartId)
    {
        echo $cartQuery = "SELECT * FROM `cart` 
        JOIN `Customer` ON `cart`.`customerId` = `customer`.`id` 
        WHERE `cartId` = '{$cartId}'";
        $cart = \Mage::getModel('Cart')->fetchRow($cartQuery);
        $order->customerId = $cart->customerId;
        $order->customerName = $cart->firstname.' '. $cart->lastname;
        $order->email = $cart->email;
        $order->paymentMethodId = $cart->paymentMethodId;
        
    }
}