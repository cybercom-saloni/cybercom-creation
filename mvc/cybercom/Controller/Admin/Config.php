<?php
namespace Controller\Admin;
class Config extends \Controller\Core\Admin
{
    public function addConfigFormAction() 
    {
        $grid = \Mage::getBlock('Admin\Config\Edit\Tabs\Configuration');
        $layout = $this->getLayout();
        $layout->setTemplate('./View/Core/Layout/twoColumn.php');
        $layout->getContent()->addChild($grid,'grid');
        $left = \Mage::getBlock('Admin\Config\Edit\Tabs');
        $layout->getLeft()->addChild($left,'left');
        echo $layout->toHtml();
    }

    public function updateConfigAction()
    {
        echo "<pre>";
        $groupData = $this->getRequest()->getPost();
        // print_r($groupData);
        $groupId = $this->getRequest()->getGet('configGroupId');
        // echo $groupId;
        foreach($groupData['Exist'] as $configId=>$configValue)
        {
            $query = "SELECT * 
            FROM `config` 
            WHERE `groupId` ={$groupId}
                AND `configId` = {$configId}";
            $config = \Mage::getModel('config')->fetchRow($query);
            $config->title = $configValue['title'];
            $config->code = $configValue['code'];
            $config->value = $configValue ['value'];
            if($config->save())
            {
                $this->getMessage()->setSuccess('Record Updated.');
            }
        }

        if(array_key_exists('new',$groupData))
        {
            $newConfig = $this->getRequest()->getPost('new');
            $title = $groupData['new']['title'];
            $code = $groupData['new']['code'];
            $value = $groupData['new']['value'];
            $configArray=[];
            for($i=0;$i<count($title);$i++)
        {
            $configArray[$i] = [
                'title' =>$title[$i],
                'code' =>$code[$i],
                'value' =>$value[$i],
                'groupId'=>$groupId
            ];
        }
        foreach($configArray as $configValue)
        {
            $config = \Mage::getModel('config');
            $config->title = $configValue['title'];
            $config->code = $configValue['code'];
            $config->value = $configValue['value'];
            $config->groupId = $groupId;
            if($config->save())
            {
                $this->getMessage()->setSuccess('Record Inserted.');
            }
        }
    }
    $this->redirect('addConfigForm');
    }

    public function deleteConfigAction()
    {
        try
        {
            $configId = $this->getRequest()->getGet('configId');
            if($configId)
            {
                $config = \Mage::getModel('config');
                if($config->delete($configId))
                {
                    $this->getMessage()->setSuccess('RECORD DELETED.');
                }
            }
        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('addConfigForm');
    }
}