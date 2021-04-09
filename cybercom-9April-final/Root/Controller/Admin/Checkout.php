<?php
namespace Controller\Admin;
class checkout extends \Controller\Core\Admin
{
    public function CheckoutAction()
    {
        $grid = \Mage::getBlock('Admin\Cart\Checkout');
        $layout = $this->getLayout();
        $layout->getContent()->addChild($grid,'grid');
        echo $layout->toHtml();
    }
}