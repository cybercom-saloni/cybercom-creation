<?php
Mage::loadFileByClassName('Controller_Core_Admin');
class Controller_Product_Media extends  Controller_Core_Admin
{
    public function gridAction()
    {  
        try     
        {   
            $grid = Mage::getBLock('block_product_grid');
            $this->getLayout()->getChild('content')->addChild($grid,'Grid');
            $this->renderLayout();
                    
        } 
        catch (Exception $e) 
        { 
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',null,[],true);
        }
    }
    public function formAction()    
    {   
        try 
        {
            $edit = Mage::getBLock('block_product_edit');
            $layout = $this->getLayout();
             $layout->setTemplate('./View/core/layout/twoColumn.php');
             $layout->getContent()->addChild($edit,'Edit');
            $content = $layout->getContent()->addChild($edit,'Edit');
            
           
            if ($this->getRequest()->getGet('productId')) 
            {
                $left = $layout->getLeft();
                $leftTab = Mage::getBlock('block_product_edit_tabs');
                $left->addChild($leftTab,'LeftTab');
            }
            $this->renderLayout();   
        } 
        catch (Exception $e) 
        { 
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',null,[],true);
        }
    }
    
    public function saveAction()
    {
       
        $this->_imageUpload();
    }

    protected function _imageUpload()
    {
        $productMedia = Mage::getModel('model_product_Media');
        $photo = $_FILES['img']['name'];
        $temName = $_FILES['img']['tmp_name'];
        $path = $productMedia->getImagePath();
        move_uploaded_file($temName, $path.$photo);    
        $productMedia->image = $photo;
        $productMedia->productId = $this->getRequest()->getGet('productId');
        $productMedia->Save();
        echo 'save';
         $this->redirect('form');
    }

    public function updateAction()
    {
         echo "<pre>";
        $data = $this->getRequest()->getPost('img');
        // print_r($data);
        foreach ($data['data'] as $key => $value) 
        {
            $productMedia = Mage::getModel('model_product_Media');
            $productMedia->load($key);
            if (array_key_exists('gallery',$value)) 
            {
                if ($value['gallery'] == 'on') 
                {
                    $value['gallery'] = 1;
                } 
                else 
                {
                    $value['gallery'] = 0;
                }
            }
            
            $productMedia->SetData($value);
            $productMedia->save();
        }
        array_shift($data);
        foreach ($data as $key => $value) 
        {
            if ($value != []) {
                $productMedia = Mage::getModel('model_product_Media');
                $id = $this->getRequest()->getGet('productId');
                $query = "update productmedia set $key=0 where productId=$id";
                echo $query;
                $productMedia->getAdapter()->update($query);
                $productMedia->load($value);
                $productMedia->$key = 1;
                $productMedia->Save();
            }
        }
        $this->redirect('form','Product_Media',["tab"=>"media"],false);
    }
    
    public function deleteAction()
    {
        $data = $this->getRequest()->getPost('remove');
        // print_r($data);
       $id = $this->getRequest()->getGet('productId');
       echo $id;
        $deleteId = [];
        foreach ($data as $id => $value) {
            $deleteId[] = $id;
            $productMedia = Mage::getModel('model_product_Media');
            $imageData = $productMedia->load($id);
            echo 1;
            // print_r($imageData);
            // die();
            $name = $imageData->image;
            unlink("Images\Product\\".$name);
        }
        $productMedia = Mage::getModel('model_product_Media');
        $deleteId = implode(",",$deleteId);
        $query = "DELETE FROM `{$productMedia->getTableName()}` 
                    WHERE `{$productMedia->getPrimaryKey()}` = ({$deleteId}) ";
        $productMedia->getAdapter()->delete($query);
       $this->redirect('form','Product_Media',["tab"=>"media"],false);
    }
}
?>