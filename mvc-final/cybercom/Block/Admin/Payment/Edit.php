<?php
namespace Block\Admin\Payment;
class  Edit extends \Block\Core\Template
{
	protected $payment=null;
	protected $template=null;
	
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Payment/Edit.php');
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
    		$payment=\Mage::getModel('Payment');
    		if($id=$this->getRequest()->getGet('paymentId')){
    			$payment=$payment->load($id);
    		}
    	}
    	$this->payment=$payment;
    	return $this;	
    }
}
?>