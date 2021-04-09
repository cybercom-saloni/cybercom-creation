<?php
namespace Block\Core;
class Template
{	
	protected $template=null;
	protected $controller=null;
	protected $children=[];
    protected $url=null;
    protected $request=null;

	public function __construct()
	{
        $this->setRequest();
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

    public function setUrl($url=null)
    {
        if(!$url)
        {
            $url=\Mage::getModel('Core\Url');
        }
        $this->url=$url;
        return $this;
    }
    public function getUrl()
    {
        if(!$this->url)
        {
            $this->setUrl();
        }
        return $this->url;
    }

    //   public function getUrl($actionName=null,$controllarName=null, $params=[], $resetparam = false)
    // {   
    //     $url = \Mage::getModel('model\core\url');
    //     return $url->getUrl($actionName,$controllarName,$params,$resetparam);
    // }
   

    public function setRequest()
    {
       $this->request=\Mage::getModel('Core\Request');
       return $this;
    }

     public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
       return $this->request;
    }

	public function setController(Controller\Core\Admin $controller=null)
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
 //        $url=\Mage::getModel('Model\Core\Url');
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

     public function addChild(\Block\Core\Template $child,$key=null)
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
        return \Mage::getBlock($className);
    }
    
    public function setMessage(Model\Admin\Message $message = null)
    {
        if (!$message) 
        {
            $message = \Mage::getModel('admin\message');
        }
        $this->message = $message;
        return $this;
    }

    public function getMessage()    
    {
        return \Mage::getModel('Admin\Message');
    }

     public function redirect($actionName=NULL,$controllerName=NULL,$param=Null,$resetParams=false)
    {
        return $this->getController()->redirect($actionName,$controllerName,$param,$resetParams);
    }

}
?>