<?php
namespace Block\Admin\CustomerGroup\Edit\Tabs;
class Information extends \Block\Core\Template
{
    protected $customerGroup=null;

    function __construct()
    {
        $this->setTemplate('./View/Admin/CustomerGroup/Edit/Tabs/Information.php');
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
            $customerGroup=\Mage::getModel('CustomerGroup');
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