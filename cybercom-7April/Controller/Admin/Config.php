<?php
namespace Controller\Admin;
class Config extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try {
            $grid=\Mage::getBlock('Admin\Config\Grid',$this);
            $layout=\Mage::getBlock('Core\Layout',$this);
            $content=$layout->getChild('content');
            $content->addChild($grid,'grid');
            echo $layout->toHtml();
        } catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
          }
    }
    
    public function configFormAction()
    {
        try{
            $edit =\Mage::getBlock('Admin\Config\Edit');
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/twoColumn.php');
            $layout->getContent()->addChild($edit,'Edit');
             $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('Admin\Config\Edit\Tab');
            $left->addChild($leftTab,'LeftTab');
            echo $layout->toHtml();    
          }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
          }
    }

    public function configAction() 
    {
        $config = $this->getRequest()->getPost('config');
        $configId=$this->getRequest()->getGet('configId');
        $query = "SELECT *
        FROM `config`
        WHERE `configId`={$configId}";
        echo $query;
       $configModel = \Mage::getModel('Config')->fetchRow($query);
       if(!$configModel)
       {
           $configModel = \Mage::getModel('Config');
       }
      $configModel->setData($config);
      $configModel->save();
      $this->redirect('grid');
    }
}