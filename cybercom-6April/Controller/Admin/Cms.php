<?php
namespace Controller\Admin;
class Cms extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try {
            $grid=\Mage::getBlock('Admin\Cms\Grid',$this);
            $layout=\Mage::getBlock('Core\Layout',$this);
            $content=$layout->getChild('content');
            $content->addChild($grid,'grid');
            echo $layout->toHtml();
        } catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
          }
    }

    public function formAction()
    {
        try {
           $edit=\Mage::getBlock('Admin\Cms\Edit');
           $layout=$this->getLayout();
           $layout->setTemplate('./View/core/layout/twoColumn.php');
           $layout->getContent()->addChild($edit,'Edit');
           $left=$layout->getLeft();
           $leftTab = \Mage::getBlock('Admin\Cms\Edit\Tabs');
           $left->addChild($leftTab,'LeftTab');
           echo $layout->toHtml();
        } catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
          }
    }

    public function saveAction()
  {
    try{
      echo "<pre>";
      print_r($this->getRequest()->getPost());

        if(!$this->getRequest()->isPost()){
            throw new Exception("invalid Request.");
        }
        $cms=\Mage::getModel('cms');

        if($id=$this->getRequest()->getGet('pageId')){
            
            $cms->pageId = $id;
        }
        else{
            $cms->createDate=date("Y-m-d H:i:s");

        }
        $cmsData=$this->getRequest()->getPost('Cms');
        $cms->setData($cmsData);
        print_r($cmsData);
        
        if($cms->save())
        {
            $msg=\Mage::getModel("admin\message");
            $msg->setSuccess('record save successfully.');
            // $this->redirect('grid',null,null,true);
        }else{
            $msg=\Mage::getModel("admin\message");
            $msg->setSuccess('unable to save record');
        }        
     }
    catch(Exception $e){
        $msg=\Mage::getModel("admin\message");
        $msg->setFailure($e->getMessage());
        // $this->redirect('grid',null,null,true);
    }
     $this->redirect('grid',null,null,true);
}

    public function statusAction(){
        try{
          $cms=\Mage::getModel('Cms');
          $pageId=(int)$this->getRequest()->getGet("pageId");
          if(!$pageId){
            $this->getMessage()->setFailure("Wrong id provided.");
          }
          if(!$cms->load($pageId)){
            $this->getMessage()->setFailure("Wrong id provided.");
          }
          $cms->status($pageId);
          $this->getMessage()->setSuccess('Status Changed Successfully');
        }catch(Exception $e){
           $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,null,true);
      }

      public function deleteAction()
      {
        try{
          $pageId = $this->getRequest()->getGet('pageId');
          if(!$pageId){
            $this->getMessage()->setFailure("Wrong id provided.");
          }
          $cms=\Mage::getModel('cms');
          if(!$cms->delete($pageId)){
            $this->getMessage()->setFailure('Unable to delete the Record.');
          }else{
          $this->getMessage()->setSuccess('Record Deleted Successfully');
          }
        }catch(Exception $e){
          $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect ('grid',null,null,true);
      }
}
