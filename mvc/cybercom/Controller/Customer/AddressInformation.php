<?php

Mage::loadFileByClassName("Model_Core_Adapter");
Mage::loadFileByClassName("Controller_Core_Admin");
Mage::loadFileByClassName("Block_Customer_Grid");
Mage::loadFileByClassName("Block_Customer_Edit");
Mage::loadFileByClassName("Model_Customer");

class Controller_Customer_AddressInformation extends Controller_Core_Admin
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
            $billing=Mage::getModel('Model_Customer_Address');
            $shipping=Mage::getModel('Model_Customer_Address');
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