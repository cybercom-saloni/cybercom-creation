<?php
namespace Controller\Admin\Customer;
class AddressInformation extends \Controller\Core\Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saveAction()
    {
        try {
            if(!$this->getRequest()->isPost())
            {
                $this->getMessage()->setFailure("Invalid  Request provided.");
            }
            $billing=\Mage::getModel('Customer\Address');
            $shipping=\Mage::getModel('Customer\Address');
            $billingData=$this->getRequest()->getPost('billing');
            $billing->customerId=$this->getRequest()->getGet('customerId');
            $billing->addressType="billing";
            $billing->setData($billingData);
            if($billing->save())
            {
                $this->getMessage()->setSuccess('recorded successfully!!');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save record.');
            }

           $shippingData=$this->getRequest()->getPost('shipping');
           $shipping->customerId=$this->getRequest()->getGet('customerId');
           $shipping->addressType="shipping";
           $shipping->setData($shippingData);
            if($shipping->save())
            {
                $this->getMessage()->setSuccess('recorded successfully!!');
            }
            else
            {
                $this->getMessage()->setFailure('Unable to save record.');
            }
                        
        }catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage()); 
        }
        $this->redirect("grid","customer",null,true);
    }
}
?>