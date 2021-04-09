<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Model\Core\Request');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Admin\CustomerGroup\Grid');
\Mage::loadFileByClassName('Block\Admin\CustomerGroup\Edit');
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\CustomerGroup');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Model\Core\Session');

class CustomerGroup extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try {
            $grid=\Mage::getBlock('Admin\CustomerGroup\Grid');
            $layout=$this->getLayout();
            $content=$layout->getChild('content');
            $content->addChild($grid,'grid');
            echo $layout->toHtml();
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
        }
    }

public function formAction()
{
    try {
        $customerGroup=\Mage::getModel('CustomerGroup');
        if($id=$this->getRequest()->getGet('groupId')){
            $customerGroup->load($id);
        }
        $form=\Mage::getBlock('Admin\CustomerGroup\Edit');
        $layout=$this->getLayout();
        $content=$layout->getChild('content');
        $layout->setTemplate('./View/Core/Layout/twoColumn.php');
        $content->addChild($form,'form');

        $left=$layout->getLeft();
        $leftTab = \Mage::getBlock('Admin\CustomerGroup\Edit\Tabs');
        $left->addChild($leftTab,'left');
        echo $layout->toHtml();


    } catch (Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
    }
}
public function saveAction()
{
   try {
       if(!$this->getRequest()->isPost())
       {
        $this->getMessage()->setFailure("Record not found");
       }
       $customerGroup=\Mage::getModel('CustomerGroup');
       if($id=$this->getRequest()->getGet('groupId'))
       {
           $customerGroup=$customerGroup->load($id);
            if(!$customerGroup)
           {
               $this->getMessage()->setFailure("Record not found");
           }
       }
       $customerGroup->createdDate=date("Y-m-d H:i:s");
       $this->getMessage()->setSuccess('Inserted Record Successfully');
       $customerData=$this->getRequest()->getPost("customerGroup");
       $customerGroup->setData($customerData);
       echo "<pre>";
       print_r($customerGroup);
       
       if(!$customerGroup->save()){
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
        $groupId=$this->getRequest()->getGet('groupId');
        if(!$groupId)
        {
            $this->getMessage()->setFailure("Wrong Id Provided");
        }
        $customerGroup=\Mage::getModel('CustomerGroup');
        if(!$customerGroup->delete($groupId)){
            $this->getMessage()->setFailure("Unable to delete the Record");
        }else{
            $this->getMessage()->setSuccess("Record Deleted Successfully");
        }
    }
    catch (Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect ('grid',null,null,true);
}

public function statusAction()
{
    try {
        $customerGroup=\Mage::getModel('CustomerGroup');
        $groupId=$this->getRequest()->getGet('groupId');
        if(!$groupId)
        {
            $this->getMessage()->setFailure("Wrong Id Provided");
        }
        if(!$customerGroup->load($groupId)){
            $this->getMessage()->setFailure("Wrong id provided.");
        }
    
        $customerGroup->status($groupId);
        $this->getMessage()->setSuccess('Status Changed Successfully');
    }catch(Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect ('grid',null,null,true);
}

}
?>