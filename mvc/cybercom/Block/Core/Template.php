<?php
class Block_Core_Template
{	
	protected $template=null;
	protected $controller=null;
	protected $children=[];
    protected $url=null;
    protected $request=null;

	public function __construct()
	{
        $this->setRequest();
		// var_dump($controller);
        // $this->setController($controller);
	}

	public function setTemplate($template){
		$this->template=$template;
		return $this;
	}

	public function getTemplate(){
		return $this->template;
	}

	public function toHtml()
	{
        ob_start();
		require_once $this->getTemplate();
        $content=ob_get_contents();
        ob_end_clean();
        return $content;
	}

    // public function setUrl($url=null)
    // {
    //     if(!$url)
    //     {
    //         $url=Mage::getModel('Model_Core_Url');
    //     }
    //     $this->url=$url;
    //     return $this;
    // }
    // public function getUrl()
    // {
    //     if(!$this->url)
    //     {
    //         $this->setUrl();
    //     }
    //     return $this->url;
    // }

      public function getUrl($actionName=null,$controllarName=null, $params=[], $resetparam = false)
    {   
        $url = Mage::getModel('model_core_url');
        return $url->getUrl($actionName,$controllarName,$params,$resetparam);
    }
   

    public function setRequest()
    {
       $this->request=Mage::getModel('Model_Core_Request');
       return $this;
    }

     public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
       return $this->request;
    }

	public function setController(Controller_Core_Admin $controller=null)
	{
		$this->controller=$controller;
		return $this;
	}

	public function getController()
	{
		return $this->controller;
	}

	// public function getUrl($actionName=NULL,$controllerName=NULL,$param=Null,$resetParams=false)
 //    {   
 //        $url=Mage::getModel('Model_Core_Url');
 //       return $url->getUrl($actionName,$controllerName,$param,$resetParams);  
 //    }

   
    

     public function setChildren(array $children=[])
    {
    	$this->children=$children;
    	return $this;
    }

     public function getChildren()
    {
    	return $this->children;
    }

     public function addChild(Block_Core_Template $child,$key=null)
    {
        if (!$key) {
            $key = get_class($child);
        }
    	$this->children[$key]=$child;
    	return $this;
    }
     public function getChild($key)
    {
    	if(!array_key_exists($key,$this->children)){
    		return null;
    	}
    	return $this->children[$key];
    }

    public function removeChild($key)
    {
    	if(array_key_exists($key,$this->children)){
    		unset($this->children[$key]);
    	}
    	return $this;
    }

    public function createBlock($className)
    {
        return Mage::getBlock($className);
    }
    
    public function setMessage(Model_Admin_Message $message = null)
    {
        if (!$message) 
        {
            $message = Mage::getModel('Model_admin_message');
        }
        $this->message = $message;
        return $this;
    }

    public function getMessage()    
    {
        return Mage::getModel('Model_Admin_Message');
    }

     public function redirect($actionName=NULL,$controllerName=NULL,$param=Null,$resetParams=false)
    {
        return $this->getController()->redirect($actionName,$controllerName,$param,$resetParams);
    }

}
?>