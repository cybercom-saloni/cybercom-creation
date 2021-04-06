<?php
namespace Controller\Admin;
class Attribute extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try {
            $grid=\Mage::getBlock('Admin\Attribute\Grid',$this);
            $layout=\Mage::getBlock('Core\Layout',$this);
            $content=$layout->getChild('content');
            $content->addChild($grid,'grid');
            echo $layout->toHtml();
        } catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
          }
    }
}