<?php
Mage::loadFileByClassName('Model_Core_Request');
Mage::loadFileByClassName('Controller_Core_Admin');
Mage::loadFileByClassName('Block_Customer_Grid');
Mage::loadFileByClassName('Block_Customer_Edit');
Mage::loadFileByClassName('Model_Core_Adapter');
Mage::loadFileByClassName('Model_Customer');
Mage::loadFileByClassName('Block_Core_Layout');
class Controller_Customer extends Controller_Core_Admin{
  public function gridAction()
  {
    try{    
        $grid=Mage::getBlock('Block_Customer_Grid',$this);
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
      $edit = Mage::getBlock('Block_Customer_Edit');
      $layout = $this->getLayout();
      $layout->setTemplate('./View/core/layout/twoColumn.php');
      $layout->getContent()->addChild($edit,'Edit');
       $left = $layout->getLeft();
      $leftTab = Mage::getBlock('Block_Customer_Edit_Tab');
      $left->addChild($leftTab,'LeftTab');
      echo $layout->toHtml();    
    }catch(Exception $e){
      $this->getMessage()->setFailure($e->getMessage());
      $this->redirect('grid',NULL,NULL,true);
    }
  }

  public function saveAction()
  {
    try{
      if(!$this->getRequest()->isPost()){
        throw new Exception("Invalid Request Method.");
      }

      $customer = Mage::getModel('Model_Customer');
      if($id = $this->getRequest()->getGet("customerId")){
        $customer = $customer->load($id);
        if(!$customer){
          // throw new Exception("Record not found");
          $this->getMessage()->setFailure("Record not found."); 
        }
        $customer->updatedDate = date("Y-m-d H:i:s");
        $this->getMessage()->setSuccess('Updated Record Successfully');
      }else{
        $customer->createdDate = date("Y-m-d H:i:s");
         $this->getMessage()->setSuccess('Inserted Record Successfully');
      }
      

      $customerData = $this->getRequest()->getPost("customer");
      $password=$this->getRequest()->getPost('password');
      $customer->password=md5($password);
      // echo $customer->password;
      $customer->setData($customerData);
      if(!$customer->save()){
        // throw new Exception("Record does not inserted.");
        $this->getMessage()->setFailure("Record does not inserted."); 
      }
      
    }catch(Exception $e){
      $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect ('grid',null,null,true);
  }

  public function deleteAction()
  {
    try{
      $customerId = $this->getRequest()->getGet('customerId');
      if(!$customerId){
        $this->getMessage()->setFailure("Wrong id provided."); 
      }
      $customer = Mage::getModel('Model_Customer');
      if(!$customer->delete($customerId)){
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
      $customer=Mage::getModel('Model_Customer');
      $customerId=(int)$this->getRequest()->getGet("customerId");
      if(!$customerId){
        $this->getMessage()->setFailure("Invalid  Id provided.");
      }
      if(!$customer->load($customerId)){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      $customer->status($customerId);
      $this->getMessage()->setSuccess('Status Changed Successfully');
    }catch(Exception $e){
         $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('grid',null,null,true);
  }
}
?>