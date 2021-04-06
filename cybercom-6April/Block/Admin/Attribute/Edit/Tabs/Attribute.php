<?php
namespace Block\Admin\Attribute\Edit\Tabs;
class Attribute extends \Block\Core\Template
{
    protected $attribute=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/Attribute/Edit/Tabs/Attribute.php");
    }
    
    public function getAttribute()
    {
        if (!$this->attribute) {
          $this->setAttribute(); 
         }
        return $this->attribute;
    }

    public function setAttribute($attribute=NULL)
    {
        if ($attribute) {
            $this->attribute = $attribute;
            return $this;
        } 
        $attribute = \Mage::getModel('Model\Attribute'); 
                
        if ($id =$this->getRequest()->getGet('attributeId'))
        {
            $attribute = $attribute->load($id);  
        } 
        $this->attribute = $attribute;
        return $this;
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('attributeId');
       echo $id; 
    }

    
}

?>