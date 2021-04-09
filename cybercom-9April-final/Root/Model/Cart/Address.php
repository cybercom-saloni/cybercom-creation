<?php
namespace Model\Cart;
class Address extends \Model\Core\Table
{
    protected $billing = null;
    const ADDRESS_TYPE_BILLING = "billing";
    const ADDRESS_TYPE_SHIPPING = "shipping";
    protected $shipping = null;
    function __construct()
    {
        $this->setTableName('cart_address');
        $this->setPrimaryKey('cartAddressId');
    }
    public function setCartBillingAddress(\Model\Cart\Address $billing)
	{
		$this->billing = $billing;
		return $this;
	}
	public function getCartbillingAddress($cart)
	{
		$query="SELECT * FROM `cart_address` WHERE `cartId`='{$cart->cartId}' AND `addressType` = 'billing'";
        $billing=\Mage::getModel('cart\Address')->fetchRow($query);
        if(!$billing)
        {
            return null;
        }
		$this->setCartbillingAddress($billing);
		return $this->billing;
	}

    public function setCartShippingAddress(\Model\Cart\Address $shipping)
	{
		$this->shipping = $shipping;
		return $this;
	}

	public function getCartShippingAddress()
	{
		$query="SELECT * FROM `cart_address` WHERE `cartId`={$this->cartId} AND `addressType` = 'shipping'";
     echo $query;
        $shipping=\Mage::getModel('cart\Address')->fetchRow($query);
        if(!$shipping)
        {
            return null;
        }
		$this->setCustomerShippingAddress($shipping);
		return $this->shipping;
	}
}