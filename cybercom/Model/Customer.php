<?php 
namespace Model;
class Customer extends \Model\Core\Table
{
	protected $shipping = null;
	protected $billing = null;
	function __construct()
	{
		$this->setTableName("customer");
		$this->setPrimaryKey("customerId");
	}

	public function setCustomerShippingAddress(\Model\Customer\Address $shipping)
	{
		$this->shipping = $shipping;
		return $this;
	}
	public function getCustomerShippingAddress()
	{
		if(!$this->customerId)
		{
			return false;
		}
		// if(!$this->customer)
		// {
		// 	$this->customer=$this->setCustomerShippingAddress();
		// }
		$query="SELECT * FROM `customer_address` WHERE `addressType`='shipping' AND `customerId` = '{$this->customerId}'";
		$id=$this->customerId;
        $address = \Mage::getModel('customer\Address')->fetchRow($query);
        return $address;
	}

	public function setCustomerBillingAddress(\Model\Customer\Address $billing)
	{
		$this->billing = $billing;
		return $this;
	}
	public function getCustomerbillingAddress()
	{
		if(!$this->customerId)
		{
			return false;
		}
		// if(!$this->customer)
		// {
		// 	$this->customer=$this->setCustomerBillingAddress();
		// }
		$query="SELECT * FROM `customer_address` WHERE `addressType`='Billing' AND `customerId` = '{$this->customerId}'";
        $address = \Mage::getModel('customer\Address')->fetchRow($query);
        return $address;
	}
}
 ?>