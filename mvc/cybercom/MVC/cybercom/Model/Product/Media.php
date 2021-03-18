<?php
Mage::loadFileByClassName('Model_Core_Table');
class Model_Product_Media extends Model_Core_Table
{
    public function __construct()
    {
        $this->setTableName('product_media');
        $this->setPrimaryKey('imageId');
    }
    public function getImagePath()
    {
        return Mage::getBaseDir('Images\Product\\');
    }
}

?>