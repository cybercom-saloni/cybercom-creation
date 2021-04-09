<?php
namespace Controller\Admin\Product;
class Media extends \Controller\Core\Admin
{
    public function gridAction()
    {  
        try     
        {   
            $grid = \Mage::getBlock('Admin\product\grid');
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
            $edit = \Mage::getBlock('admin\product\edit');
            $layout = $this->getLayout();
             $layout->setTemplate('./View/core/layout/twoColumn.php');
             $layout->getContent()->addChild($edit,'Edit');
            $content = $layout->getContent()->addChild($edit,'Edit');
            
           
            if ($this->getRequest()->getGet('productId')) 
            {
                $left = $layout->getLeft();
                $leftTab = \Mage::getBlock('admin\product\edit\tabs');
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
        $productMedia = \Mage::getModel('product\Media');
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
        print_r($data);
        foreach ($data['data'] as $key => $value) 
        {
            $productMedia = \Mage::getModel('product\Media');
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
        foreach ($data as $key => $value) 
        {
            if ($value != []) {
                $productMedia = \Mage::getModel('product\Media');
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
        $deleteId = [];
        foreach ($data as $id => $value) {
            $deleteId[] = $id;
            $productMedia =\Mage::getModel('product\Media');
            $imageData = $productMedia->load($id);
            $name = $imageData->image;
            unlink("Images\Product\\".$name);
        }
        $productMedia = \Mage::getModel('product\Media');
        $deleteId = implode(",",$deleteId);
        $query = "DELETE FROM `{$productMedia->getTableName()}` 
                    WHERE `{$productMedia->getPrimaryKey()}` ={$deleteId}";
        $productMedia->getAdapter()->delete($query);
       $this->redirect('form','Product_Media',["tab"=>"media"],false);
    }
}
?>