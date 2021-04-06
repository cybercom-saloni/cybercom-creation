<?php
mage::loadFileByClassName('Model_Core_Request');
class Controller_Core_Admin {
    protected $request=Null;
    protected $layout=Null;
    public function __construct()
    {
        $this->setRequest();
        $this->setMessage();

    }
    public function setRequest(){
        $this->request=Mage::getModel('Model_Core_Request');
        return $this;
    }
     public function getRequest(){
        if(!$this->request){
            $this->setRequest();
        }
        return $this->request;
    }

    public function redirect($actionName=NULL,$controllerName=NULL,$param=Null,$resetParams=false)
    {
        header("Location:{$this->getUrl($actionName,$controllerName,$param,$resetParams)}");
    }

    public function getUrl($actionName=NULL,$controllerName=Null,$param=Null,$resetParams=false)
    {
        if($param==Null)
        {
            $param=[];
        }
        if($actionName==NULL){
            $actionName=$_GET['a'];
        }
        if($controllerName==NULL){
            $controllerName=$_GET['c'];
        }
        $final=$_GET;
        if($resetParams){
            $final=[];
        }
        $final['c']=$controllerName;
        $final['a']=$actionName;
        $final=array_merge($final,$param);
        $queryString=http_build_query($final);
        unset($final);
        
        
       return "http://localhost/cybercom/cybercom/index.php?{$queryString}";
       
    }
    public function setLayout(Block_Core_Layout $layout=null,$controllerName=null)
    {
        if(!$controllerName){
            $controllerName=$this;
        }
       if(!$layout){
        $layout=Mage::getBlock('Block_Core_Layout',$controllerName);
       }
       $this->layout=$layout;
       return $this;
    }

    public function getLayout(){
        if(!$this->layout){
             $this->setLayout(null,$this);
        }
        return $this->layout;
    }

    public function renderLayout(){
        // echo "<pre>";
        // print_r($this->getLayout());
       echo $this->getLayout()->toHtml();
    }

    public function setMessage()
    {
        $this->message=Mage::getModel('Model_Admin_Message');
        return $this;
    }

    public function getMessage()
    {
       return $this->message;
    }

}?>