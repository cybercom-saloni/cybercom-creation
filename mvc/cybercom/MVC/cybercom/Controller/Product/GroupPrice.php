<?php
Mage::loadFileByClassName('Controller_Core_Admin');
class Controller_Product_GroupPrice extends Controller_Core_Admin
{
    function __construct()
	{
		 parent::__construct();
	}

    public function saveAction()
    {
        try {
            $groupData=$this->getRequest()->getPost('groupPrice');
            $productId=(int)$this->getRequest()->getGet('productId');
            if(array_key_exists('exists',$groupData))
            {
                foreach($groupData['exists'] as $groupId=>$price)
                {
                 
                    $groupPriceUpdate=Mage::getModel('Model_Product_Group_Price');
                   echo $groupPriceUpdate->customerGroupId;
                    
                    $query="UPDATE `product_group_price` 
                                SET `price`='{$price}'
                                WHERE `customerGroupId`='{$groupId}'
                                AND `productId`='{$productId}'";
                    echo $query;
                    if($groupPriceUpdate->update($query))
                    {
                        $msg=Mage::getModel('Model_Admin_Message');
                        $msg->setSuccess("Group Price Update!!!");
                    }
                    else
                    {
                        $msg=Mage::getModel('Model_Admin_Message');
                        $msg->setSuccess("Unable to Update the Group Price!!!");
                    }
                }
             }
        
            
             
            foreach($groupData['new'] as $groupId=>$price){
              $groupPrice=Mage::getModel('Model_Product_Group_Price');
              $groupPrice->customerGroupId=$groupId;
              $groupPrice->price=$price;
              $groupPrice->productId=$productId;
             
              if($groupPrice->save())
              {
                  $msg=Mage::getModel('Model_Admin_Message');
                   $this->getMessage()->setSuccess("Group Price saved!!!");
              }
              else
              {
                  $msg=Mage::getModel('Model_Admin_Message');
                   $this->getMessage()->setSuccess("Unable to save the Group Price!!!");
              }

            }
           
            } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage()); 
        }
        $this->redirect('form', 'product', null, false);
    }

}
?>