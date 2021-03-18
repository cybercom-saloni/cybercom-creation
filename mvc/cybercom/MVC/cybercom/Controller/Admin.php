<?php 
Mage::loadFileByClassName('Model_Core_Request');
Mage::loadFileByClassName('Controller_Core_Admin');
Mage::loadFileByClassName('Block_Admin_Grid');
Mage::loadFileByClassName('Block_Admin_Edit');
Mage::loadFileByClassName('Model_Core_Adapter');
Mage::loadFileByClassName('Model_Admin');
Mage::loadFileByClassName('Block_Core_Layout');

class Controller_Admin extends Controller_Core_Admin{
  protected $model=NULL;
  
  public function gridAction()
  {
    try{    
        $grid=Mage::getBlock('Block_Admin_Grid',$this);
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
      $edit=Mage::getBlock('Block_Admin_Edit');
      $layout = $this->getLayout();
      $layout->setTemplate('./View/core/layout/twoColumn.php');
      $layout->getContent()->addChild($edit,'Edit');
      $left = $layout->getLeft();
      $leftTab = Mage::getBlock('Block_Admin_Edit_Tabs');
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
            $admin = Mage::getModel('Model_Admin');
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
      $admin=Mage::getModel('Model_Admin');
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
      $admin=Mage::getModel('Model_admin');
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