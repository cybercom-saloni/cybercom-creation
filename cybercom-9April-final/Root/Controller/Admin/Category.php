<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
class Category extends \Controller\Core\Admin{
  
    public function gridAction(){
      try {
        $grid=\Mage::getBlock('Admin\Category\Grid');
        $layout=\Mage::getBlock('Core\Layout');
        $content=$layout->getChild('content');
        $content->addChild($grid,'grid');
        echo $layout->toHtml();
      } catch (Exception $e) {
         $this->getMessage()->setFailure($e->getMessage());
      }
    }

    public function formAction(){
        try {
          $edit=\Mage::getBlock('Admin\Category\Edit');
          $layout=\Mage::getBlock('Core\Layout');
          $layout->setTemplate('./View/core/layout/twoColumn.php');
          $layout->getContent()->addChild($edit,'Edit');
          $left = $layout->getLeft();
          $leftTab = \Mage::getBlock('Admin\Category\Edit\Tabs');
          $left->addChild($leftTab,'LeftTab');
          echo $layout->toHtml();   
          } catch (Exception $e) {
              $this->getMessage()->setFailure($e->getMessage()); 
          }
          $this->redirect('grid',NULL,NULL,true);
      }

      public function saveAction()
    { 
    	try {
            $category = \Mage::getModel('Category');
            if(!$this->getRequest()->isPost()){
              $this->getMessage()->setFailure("Invalid Request."); 
            }

            if ($id = $this->getRequest()->getGet('categoryId')) {
                $category = $category->load($id);
                $pathId = $category->pathId;
                if (!$category){
                  $this->getMessage()->setFailure("Records not found.");
                }
                $categoryData = $this->getRequest()->getPost('category'); 
                $category->setData($categoryData);
                $pathId = $category->pathId;
                $category->updatePathId();
                $category->updateChildrenPathIds($pathId);
            }
            else {
                $categoryData = $this->getRequest()->getPost('category'); 
                $category->setData($categoryData);
                $id = $category->save();
                $category->load($id);
                $category->updatePathId();
            }
        } 
        catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        $this->redirect("grid",null,null,ture);
    }
    public function deleteAction() {
      try {
              $category=\Mage::getModel("Category");
  
              if ($categoryId = $this->getRequest()->getGet('categoryId')) {
                  $category = $category->load($categoryId);
                  if (!$category) {
                    $this->getMessage()->setFailure("Wrong id provided.");  
                  }
              }
              $pathId = $category->pathId;
              $parentId = $category->parentId;
              $category->updateChildrenPathIds($pathId, $parentId, $categoryId);
              
              $category->delete();
          }  
          catch(Exception $e){
              $this->getMessage()->setFailure($e->getMessage());
              //echo $e->getMessage();
          }   
          $this->redirect('grid',null,null,true);
    }
  //   public function deleteAction(){
  //   try {
  //     $categoryId=$this->getRequest()->getGet('categoryId');
  //     if(!$categoryId){
  //        $this->getMessage()->setFailure("Wrong id provided.");  
  //     }
  //     $category=\Mage::getModel('Category');
  //     $pathId=$category->pathId;
  //     $parentId=$category->parentId;
  //     $category->updateChildrenPathIds($pathId,$parentId,$categoryId);
  //     if (!$category->delete($categoryId)) {
  //        $this->getMessage()->setFailure("Record does not deleted.");  
  //     }

  //   } catch (Exception $e) {
  //      $this->getMessage()->setFailure($e->getMessage()); 
  //   }
  //    $this->getMessage()->setSuccess('Record Deleted Successfully');
  //   $this->redirect('grid',null,null,true);
  // }

  public function StatusAction(){
      try {
        $category=\Mage::getModel('Category');
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
