<?php 
namespace Block\Admin\Customer\Edit\Tabs;
class AddressInformation extends \Block\Core\Template
{
	protected $shipping=null;
    protected $billing=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Customer/Edit/Tabs/AddressInformation.php');
	}
	public function setBilling($billing=null)
	{
		if(!$billing)
		{
			$billing=\Mage::getModel('Customer\Address');
            if($customerId=$this->getRequest()->getGet('customerId'))
            {
                $query="SELECT *
                         FROM `customer_address`
                         WHERE `customerId`=$customerId
                            AND `addressType`='billing'";
                $row=$billing->fetchRow($query);
                 $this->billing=$row;
            }
		}
        $this->billing=$billing;
        return $this;
	}

    public function getBilling()
    {
        if(!$this->billing)
        {
            $this->setBilling();
        }
        return $this->billing;
    }
    public function setShipping($shipping=null)
    {
        if(!$shipping)
        {
            $shipping=\Mage::getModel('Customer\Address');
            if($customerId=$this->getRequest()->getGet('customerId'))
            {
                $query="SELECT * FROM `customer_address` WHERE `customerId`='$customerId' AND `addressType`='shipping'";
                $row=$shipping->fetchRow($query);
                $this->shipping=$row;
            }
        }
        $this->shipping=$shipping;
        return $this;
    }

    public function getShipping()
    {
        if(!$this->shipping)
        {
            $this->setShipping();
        }
        return $this->shipping;
    }
}
?>