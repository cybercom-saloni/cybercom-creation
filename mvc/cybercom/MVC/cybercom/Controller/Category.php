<?php
Mage::loadFileByClassName('Model_Core_Request');
Mage::loadFileByClassName('Controller_Core_Admin');
Mage::loadFileByClassName('Block_Category_Grid');
Mage::loadFileByClassName('Block_Category_Edit');
Mage::loadFileByClassName('Model_Core_Adapter');
Mage::loadFileByClassName('Model_Category');
Mage::loadFileByClassName('Block_Core_Layout');
class Controller_Category extends Controller_Core_Admin{
  
    public function gridAction(){
      try {
        $grid=Mage::getBlock('Block_Category_Grid');
        $layout=Mage::getBlock('Block_Core_Layout');
        $content=$layout->getChild('content');
        $content->addChild($grid,'grid');
        echo $layout->toHtml();
      } catch (Exception $e) {
         $this->getMessage()->setFailure($e->getMessage());
      }
    }

    public function formAction(){
        try {
          $edit=Mage::getBlock('Block_Category_Edit');
          $layout=Mage::getBlock('Block_Core_Layout');
          $layout->setTemplate('./View/core/layout/twoColumn.php');
          $layout->getContent()->addChild($edit,'Edit');
          echo $layout->toHtml();   
          } catch (Exception $e) {
              $this->getMessage()->setFailure($e->getMessage()); 
          }
          $this->redirect('grid',NULL,NULL,true);
      }

   
    public function saveAction()
    {
      try {
        if(!$this->getRequest()->isPost()){
           $this->getMessage()->setFailure("Invalid Request."); 
        }
        $category=Mage::getModel('Model_Category');
        if($id=$this->getRequest()->getGet("categoryId")){
          $category=$category->load($id);
          if(!$category){
             $this->getMessage()->setFailure("Record not found.");  
          }
        }

        $categoryData=$this->getRequest()->getPost("category");
        $category->setData($categoryData);
        if(!$category->save()){
          $this->getMessage()->setFailure("Record does not inserted.");  
        }
        $this->getMessage()->setSuccess('Recorded Successfully');
        
      } catch (Exception $e) {
        $this->getMessage()->setFailure($e->getMessage()); 
      }
      $this->redirect('grid',NULL,NULL,NULL,true);
    }
    
  public function deleteAction(){
    try {
      $categoryId=$this->getRequest()->getGet('categoryId');
      if(!$categoryId){
         $this->getMessage()->setFailure("Wrong id provided.");  
      }
      $category=Mage::getModel('Model_Category');
      if (!$category->delete($categoryId)) {
         $this->getMessage()->setFailure("Record does not deleted.");  
      }
    } catch (Exception $e) {
       $this->getMessage()->setFailure($e->getMessage()); 
    }
     $this->getMessage()->setSuccess('Record Deleted Successfully');
    $this->redirect('grid',null,null,true);
  }

  public function StatusAction(){
      try {
        $category=Mage::getModel('Model_Category');
        $categoryId=(int)$this->getRequest()->getGet("categoryId");
        if(!$categoryId){
           $this->getMessage()->setFailure("Wrong id provided.");  
        }
        if(!$category->load($categoryId)){
           $this->getMessage()->setFailure("Wrong id provided.");  
        }
        $category->status($categoryId);
      } catch (Exception $e) {
        $this->getMessage()->setFailure($e->getMessage()); 
      }
      $this->getMessage()->setSuccess('Status Changed Successfully');   
      $this->redirect('grid',NULL,NULL,true);
  }
}
?>
