<?php 
class Block_Product_Edit_Tabs_Media extends Block_Core_Template
{
	protected $image = null;
    public function __construct()
    {
        $this->setTemplate('./View/product/edit/tabs/media.php');
    }

    public function setImage($image = null)
    {
        if (!$image) {
            $id = $this->getRequest()->getGet('productId');
            $image =  Mage::getModel('model_product_Media');
            $query = "SELECT * FROM `{$image->getTableName()}` WHERE `productId` = $id";
            $image = $image->fetchAll($query);
        }
        $this->image = $image;
        return $this;
    }
    public function getImage()
    {
        if (!$this->image) {
            $this->setImage();
        }
        return $this->image;     
    }        
}
?>	