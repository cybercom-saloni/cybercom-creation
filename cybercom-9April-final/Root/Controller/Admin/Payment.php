<?php 
namespace Controller\Admin;
class Payment extends \Controller\Core\Admin{
  public function gridAction()
  {
    try{    
        $grid=\Mage::getBlock('Admin\Payment\Grid',$this);
        $layout=\Mage::getBlock('Core\Layout',$this);
        $content= $layout->getChild('content');
        $content->addChild($grid,'grid'); 
        echo $layout->toHtml();  
      }catch(Exception $e){
        $this->getMessage()->setFailure($e->getMessage());
        $this->redirect('grid',NULL,NULL,true);
      }
  }

  public function formAction()
  {
    try{
      $edit=\Mage::getBlock('Admin\Payment\Edit',$this);
      $layout=\Mage::getBlock('Core\Layout',$this);
      $content= $layout->getChild('content');
      $content->addChild($edit,'edit'); 
      echo $layout->toHtml();
    }catch(Exception $e){
       $this->getMessage()->setFailure($e->getMessage());
      $this->redirect('grid',NULL,NULL,true);
    }
  }

  public function saveAction()
{
   try {
       if(!$this->getRequest()->isPost())
       {
        $this->getMessage()->setFailure("Record not found");
       }
       $payment=\Mage::getModel('payment');
       if($id=$this->getRequest()->getGet('paymentId'))
       {
           $payment=$payment->load($id);
            if(!$payment)
           {
               $this->getMessage()->setFailure("Record not found");
           }
       }
       $payment->createdDate=date("Y-m-d H:i:s");
       $this->getMessage()->setSuccess('Inserted Record Successfully');
       $customerData=$this->getRequest()->getPost("payment");
       $payment->setData($customerData);
       if(!$payment->save()){
         $this->getMessage()->setFailure("Record does not inserted");
      }
   } catch (Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect ('grid',null,null,true);
}

  public function deleteAction()
  {
    try{
      $paymentId = $this->getRequest()->getGet('paymentId');
      if(!$paymentId){
        $this->getMessage()->setFailure("Wrong id provided."); 
      }
      $payment=\Mage::getModel('payment');
      if(!$payment->delete($paymentId)){
        $this->getMessage()->setFailure("Record does not deleted."); 
      }
    }catch(Exception $e){
     $this->getMessage()->setFailure($e->getMessage());
    }
    $this->getMessage()->setSuccess('Record Deleted Successfully');
    $this->redirect ('grid',null,null,true);
  }

  public function statusAction(){
    try{
      $payment=\Mage::getModel('Payment');
      $paymentId=(int)$this->getRequest()->getGet("paymentId");
      if(!$paymentId){
        // throw new Exception("Invalid Id.");
        $this->getMessage()->setFailure("Invalid  Id provided.");
      }
      if(!$payment->load($paymentId)){
        // throw new Exception("Invalid.");
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      
      $payment->status($paymentId);
      $this->getMessage()->setSuccess('Status Changed Successfully');
    }catch(Exception $e){
         $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('grid',null,null,true);
  }
}
 ?>