<?php
namespace Controller\Admin;
class Product extends \Controller\Core\Admin{


  public function gridAction()
  {
    try{    
        $grid=\Mage::getBlock('Admin\Product\Grid');
      $layout = $this->getLayout();
      $layout->setTemplate('./View/core/layout/oneColumn.php');
       $content= $layout->getChild('content');
       $content->addChild($grid,'grid');
       echo $layout->toHtml();  
    }catch(Exception $e){
      $this->getMessage()->setFailure($e->getMessage());
    }
  }

  public function formAction()
  {
    try{
      $edit = \Mage::getBlock('Admin\Product\Edit');
      $layout = $this->getLayout();
      $layout->setTemplate('./View/core/layout/twoColumn.php');
      $layout->getContent()->addChild($edit,'Edit');
      $left = $layout->getLeft();
      $leftTab = \Mage::getBlock('Admin\Product\Edit\Tabs');
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
         $this->getMessage()->setFailure("Record not found");
      }
      $product =\Mage::getModel('Product');
      if($id = $this->getRequest()->getGet("productId")){
        $product = $product->load($id);
        if(!$product){
          $this->getMessage()->setFailure("Record not found");
        }
        $product->updatedDate = date("Y-m-d H:i:s");
        $this->getMessage()->setSuccess('Updated Record Successfully');
      }else{
        $product->createdDate = date("Y-m-d H:i:s");
        $this->getMessage()->setSuccess('Inserted Record Successfully');
      }
    
      $productData = $this->getRequest()->getPost("product");
      $product->setData($productData);
      if(!$product->save()){
         $this->getMessage()->setFailure("Record does not inserted");
      }
      $this->redirect ('grid',null,null,true);
      
    }catch(Exception $e){
       $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect ('grid',null,null,true);
  }

  public function deleteAction()
  {
    try{
      $productId = $this->getRequest()->getGet('productId');
      if(!$productId){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      $product=\Mage::getModel('Product');
      if(!$product->delete($productId)){
        $this->getMessage()->setFailure('Unable to delete the Record.');
      }else{
      $this->getMessage()->setSuccess('Record Deleted Successfully');
      }
    }catch(Exception $e){
      $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect ('grid',null,null,true);
  }

  public function statusAction(){
    try{
      $product=\Mage::getModel('Product');
      $productId=(int)$this->getRequest()->getGet("productId");
      if(!$productId){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      if(!$product->load($productId)){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      $product->status($productId);
      $this->getMessage()->setSuccess('Status Changed Successfully');
    }catch(Exception $e){
       $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('grid',null,null,true);
  }
}
?>