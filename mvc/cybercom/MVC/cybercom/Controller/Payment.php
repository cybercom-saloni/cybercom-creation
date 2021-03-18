<?php 
Mage::loadFileByClassName('Model_Core_Request');
Mage::loadFileByClassName('Controller_Core_Admin');
Mage::loadFileByClassName('Block_Payment_Grid');
Mage::loadFileByClassName('Block_Payment_Edit');
Mage::loadFileByClassName('Model_Core_Adapter');
Mage::loadFileByClassName('Model_Payment');
Mage::loadFileByClassName('Block_Core_Layout');

class Controller_Payment extends Controller_Core_Admin{
  public function gridAction()
  {
    try{    
        $grid=Mage::getBlock('Block_Payment_Grid',$this);
        $layout=Mage::getBlock('Block_Core_Layout',$this);
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
      $edit=Mage::getBlock('Block_Payment_Edit',$this);
      $layout=Mage::getBlock('Block_Core_Layout',$this);
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
       $payment=Mage::getModel('Model_payment');
       if($id=$this->getRequest()->getGet('groupId'))
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
      $payment=Mage::getModel('Model_payment');
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
      $payment=Mage::getModel('Model_Payment');
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