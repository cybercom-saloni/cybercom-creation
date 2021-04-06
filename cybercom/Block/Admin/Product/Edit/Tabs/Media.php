<?php
namespace Block\Admin\Product\Edit\Tabs; 
class Media extends \Block\Core\Template
{
	protected $image = null;
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Product/Edit/Tabs/Media.php');
    }

    public function setImage($image = null)
    {
        if (!$image) {
            $id = $this->getRequest()->getGet('productId');
            $image =\Mage::getModel('Product\Media');
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