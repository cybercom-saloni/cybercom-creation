<?php 
namespace Controller\Admin;
class Admin extends \Controller\Core\Admin{
  protected $model=NULL;
  
  public function gridAction()
  {
    try{    
        $grid=\Mage::getBlock('Admin\Admin\Grid');
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
      $edit=\Mage::getBlock('Admin\Admin\Edit');
      $layout = $this->getLayout();
      $layout->setTemplate('./View/core/layout/twoColumn.php');
      $layout->getContent()->addChild($edit,'Edit');
      $left = $layout->getLeft();
      $leftTab = \Mage::getBlock('Admin\Admin\Edit\Tabs');
      $left->addChild($leftTab,'LeftTab');
      echo $layout->toHtml();   
      }catch(Exception $e){
       $this->getMessage()->setFailure($e->getMessage());
       $this->redirect('grid',NULL,NULL,true);
      }
  }

   public function saveAction()
    {
       try
        {
             $id = $this->getRequest()->getGet('adminId');
            $admin = \Mage::getModel('Admin');
            if(!$this->getRequest()->isPost())
            {
                throw new Exception(" Invalid Post Request");
            }
            $id = $this->getRequest()->getGet('adminId');
            if(!$id)
            {
                $admin->createdDate = date('Y-m-d H:i:s');
            }
            else
            {
                $admin= $admin->load($id);
                if(!$admin)
                {
                    throw new Exception("ID not get");
                }
               
            }
            $adminData = $this->getRequest()->getPost('admin');
            $password=$this->getRequest()->getPost('password');
            $admin->password=md5($password);
            $admin->setData($adminData);
            $admins=$admin->Save();
            $this->redirect('grid',null,null,true);       
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

  public function deleteAction()
  {
    try{
      $adminId = $this->getRequest()->getGet('adminId');
      if(!$adminId){
        $this->getMessage()->setFailure("Wrong id provided."); 
      }
      $admin=\Mage::getModel('Admin');
      if(!$admin->delete($adminId)){
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
      $admin=\Mage::getModel('admin');
      $adminId=(int)$this->getRequest()->getGet("adminId");
      if(!$adminId){
        $this->getMessage()->setFailure("Invalid  Id provided.");
      }
      if(!$admin->load($adminId)){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      $admin->status($adminId);
      $this->getMessage()->setSuccess('Status Changed Successfully');
    }catch(Exception $e){
         $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('grid',null,null,true);
  }
}
 ?>