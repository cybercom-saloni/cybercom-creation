<?php
namespace Controller\Admin;
class Customer extends \Controller\Core\Admin{
  public function gridAction()
  {
    try{    
        $grid=\Mage::getBlock('Admin\Customer\Grid');
        $layout=\Mage::getBlock('Core\Layout');
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
      $edit =\Mage::getBlock('Admin\Customer\Edit');
      $layout = $this->getLayout();
      $layout->setTemplate('./View/core/layout/twoColumn.php');
      $layout->getContent()->addChild($edit,'Edit');
       $left = $layout->getLeft();
      $leftTab = \Mage::getBlock('Admin\Customer\Edit\Tab');
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

      $customer = \Mage::getModel('Customer');
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
      $customer =\Mage::getModel('Customer');
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
      $customer=\Mage::getModel('Customer');
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