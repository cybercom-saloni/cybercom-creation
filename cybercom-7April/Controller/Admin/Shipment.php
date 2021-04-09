<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Model\Core\Request');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Admin\Shipment\Grid');
\Mage::loadFileByClassName('Block\Admin\Shipment\Edit');
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Shipment');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Model\Core\Session');
class Shipment extends \Controller\Core\Admin{

  public function gridAction()
  {
    try{    
      $grid=\Mage::getBlock('Admin\Shipment\Grid',$this);
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
      $edit=\Mage::getBlock('Admin\Shipment\Edit',$this);
      $layout=\Mage::getBlock('Core\Layout',$this);
      $content= $layout->getChild('content');
      $content->addChild($edit,'edit'); 
      echo $layout->toHtml();
    }catch(Exception $e){
      echo $e->getMessage();
       $this->getMessage()->setFailure($e->getMessage());
    }
  }

   public function saveAction()
    {
     
       try
        {
             $id = $this->getRequest()->getGet('shipmentId');
            $shipment = \Mage::getModel('Shipment');
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
      $shipment=\Mage::getModel('shipment');
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
      $shipment=\Mage::getModel('Shipment');
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