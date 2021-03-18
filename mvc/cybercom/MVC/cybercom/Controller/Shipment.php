<?php
Mage::loadFileByClassName('Model_Core_Request');
Mage::loadFileByClassName('Controller_Core_Admin');
Mage::loadFileByClassName('Block_Shipment_Grid');
Mage::loadFileByClassName('Block_Shipment_Edit');
Mage::loadFileByClassName('Model_Core_Adapter');
Mage::loadFileByClassName('Model_Shipment');
Mage::loadFileByClassName('Block_Core_Layout');
Mage::loadFileByClassName('Model_Core_Session');
class Controller_Shipment extends Controller_Core_Admin{

  public function gridAction()
  {
    try{    
      $grid=Mage::getBlock('Block_Shipment_Grid',$this);
      $layout = $this->getLayout();
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
      $edit=Mage::getBlock('Block_Shipment_Edit',$this);
      $layout=Mage::getBlock('Block_Core_Layout',$this);
      $content= $layout->getChild('content');
      $content->addChild($edit,'edit'); 
      echo $layout->toHtml();
    }catch(Exception $e){
      echo $e->getMessage();
       $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('grid',NULL,NULL,true);
  }

   public function saveAction()
    {
     
       try
        {
             $id = $this->getRequest()->getGet('shipmentId');
            $shipment = Mage::getModel('Model_Shipment');
            if(!$this->getRequest()->isPost())
            {
                throw new Exception(" Invalid Post Request");
            }
            $id = $this->getRequest()->getGet('shipmentId');
            if(!$id)
            {
                $shipment->createdDate = date('Y-m-d H:i:s');
            }
            else
            {
                $shipment= $shipment->load($id);
                if(!$shipment)
                {
                    throw new Exception("ID not get");
                }
               
            }
            $shipmentData = $this->getRequest()->getPost('shipment');
            $shipment->setData($shipmentData);
            $shipments=$shipment->Save();
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
      $shipmentId = $this->getRequest()->getGet('shipmentId');
      if(!$shipmentId){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      $shipment=Mage::getModel('Model_shipment');
      if(!$shipment->delete($shipmentId)){
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
      $shipment=Mage::getModel('Model_Shipment');
      $shipmentId=(int)$this->getRequest()->getGet("shipmentId");
      if(!$shipmentId){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      if(!$shipment->load($shipmentId)){
        $this->getMessage()->setFailure("Wrong id provided.");
      }
      $shipment->status($shipmentId);
      $this->getMessage()->setSuccess('Status Changed Successfully');
    }catch(Exception $e){
       $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('grid',null,null,true);
  }
}
?>