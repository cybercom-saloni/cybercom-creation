<?php
class Block_CustomerGroup_Edit_Tabs_Information extends Block_Core_Template
{
    protected $customerGroup=null;

    function __construct()
    {
        $this->setTemplate('./View/CustomerGroup/Edit/Tabs/Information.php');
    }

    public  function getCustomerGroup()
    {
        if(!$this->customerGroup){
            $this->setCustomerGroup();
        }
        return $this->customerGroup;
    }
    
    public function setCustomerGroup($customerGroup=null)
    {
        if(!$customerGroup){
            $customerGroup=Mage::getModel('Model_CustomerGroup');
            if($id=$this->getRequest()->getGet('groupId'))
            {
                $customerGroup=$customerGroup->load($id);
            }
            $this->customerGroup=$customerGroup;
            return $this;
        }
    }
}
?>