<?php
namespace Model\Product;
class Media extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTableName('product_media');
        $this->setPrimaryKey('imageId');
    }
    public function getImagePath()
    {
        return \Mage::getBaseDir('Images\Product\\');
    }
}

?>