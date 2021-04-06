<?php
namespace Model\Cart;
class Item extends \Model\Core\Table
{
    protected $cart = null;
    protected $product = null;
    public function __construct()
    {
        $this->setTableName('cart_item');
        $this->setPrimaryKey('cartItemId');
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        if($this->cart)
        {
            return $this->cart;
        }
        if(!$this->cartId)
        {
            return false;
        }
        $cart = \Mage::getModel('cart')->load($cartId);
        $this->setCart($cart);
        return $this->cart;
    }

    public function setProduct(\Model\Product $product)
    {
        $this->product=$product;
        return $this;
    }
    public function getProduct()
    {
        if($this->product)
        {
            return $this->product;
        }

        if(!$this->productId)
        {
            return false;
        }
        $product = \Mage::getModel('product')->load($productId);
        $this->setProduct($product);
        return $this->product;
    }
}