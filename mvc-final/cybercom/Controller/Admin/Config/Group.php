<?php
namespace Controller\Admin\Config;
class Group extends \Controller\Core\Admin
{
    public function gridAction()
    {
        $grid = \Mage::getBlock('Admin\Config\Grid');
        $layout = $this->getLayout();
        $layout->getContent()->addChild($grid,'grid');
        echo $layout->toHtml();
    }

    public function configFormAction() 
    {
        try 
        {
            $id=$this->getRequest()->getGet('configGroupId');
            $layout = $this->getLayout();
            if($id)
            {
                $layout->setTemplate('./View/core/layout/twoColumn.php');
                $left = \Mage::getBlock('Admin\Config\Edit\Tabs');
                $layout->getLeft()->addChild($left,'left');
            }
            $form = \Mage::getBlock("Admin\Config\Edit");
            $layout->getContent()->addChild($form,'form');
            echo $layout->toHtml();
        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',NULL,NULL,true);
        }
    }

    public function saveAction()
    {
        try {
            $configGroup = $this->getRequest()->getPost('configGroup');
            $configGroupId = $this->getRequest()->getGet('configGroupId');
            $configGroupModel = \Mage::getModel('Config\Group');
            if($configGroupId)
            {
                $configGroupModel = $configGroupModel->load($configGroupId);
            }
            $configGroupModel->setData($configGroup);
            if($configGroupModel->save())
            {
                $this->getMessage()->setSuccess('Updated');
            }

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',NULL,NULL,true);
    }

    public function configGroupDeleteAction()
    {
        $configGroupId = $this->getRequest()->getGet('configGroupId');
        $configGroupModel = \Mage::getModel('Config\Group');
        if($configGroupModel->delete($configGroupId))
            {
                $this->getMessage()->setSuccess('Updated');
            }
            $this->redirect('grid',NULL,NULL,true);
    }
}