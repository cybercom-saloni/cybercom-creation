<?php
class  Block_Payment_Edit extends Block_Core_Template
{
	protected $payment=null;
	protected $template=null;
	
    public function __construct()
    {
        $this->setTemplate('./View/Payment/Edit.php');
    }
	
    public function getPayment()
    {
    	if(!$this->payment){
    		$this->setpayment();
    	}
    	return $this->payment;
    }
     public function setPayment()
    {
    	if(!$this->payment){
    		$payment=Mage::getModel('Model_Payment');
    		if($id=$this->getRequest()->getGet('paymentId')){
    			$payment=$payment->load($id);
    		}
    	}
    	$this->payment=$payment;
    	return $this;	
    }
}
?>