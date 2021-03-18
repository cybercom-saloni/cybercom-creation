<?php
Mage::loadFileByClassName('Model_Core_Request');
Mage::loadFileByClassName('Controller_Core_Admin');
Mage::loadFileByClassName('Block_CustomerGroup_Grid');
Mage::loadFileByClassName('Block_CustomerGroup_Edit');
Mage::loadFileByClassName('Model_Core_Adapter');
Mage::loadFileByClassName('Model_CustomerGroup');
Mage::loadFileByClassName('Block_Core_Layout');
Mage::loadFileByClassName('Model_Core_Session');
class Controller_CustomerGroup extends Controller_Core_Admin
{
    public function gridAction()
    {
        try {
            $grid=Mage::getBlock('Block_CustomerGroup_Grid');
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
        $customerGroup=Mage::getModel('Model_CustomerGroup');
        if($id=$this->getRequest()->getGet('groupId')){
            $customerGroup->load($id);
        }
        $form=Mage::getBlock('Block_CustomerGroup_Edit');
        $layout=$this->getLayout();
        $content=$layout->getChild('content');
        $layout->setTemplate('./View/Core/Layout/twoColumn.php');
        $content->addChild($form,'form');

        $left=$layout->getLeft();
        $leftTab = Mage::getBlock('Block_CustomerGroup_Edit_Tabs');
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
       $customerGroup=Mage::getModel('Model_CustomerGroup');
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
        $customerGroup=Mage::getModel('Model_CustomerGroup');
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
        $customerGroup=Mage::getModel('Model_CustomerGroup');
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