<?php 
namespace Model\Core;
/**
 * 
 */
class Url
{
	
	protected $request=null;

	public function __construct()
	{
		$this->setRequest();
	}
    public function setRequest()
	{
		$this->request=\Mage::getModel('Core\Request');
	}

	public function getRequest()
	{
		return $this->request;
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
    public function baseUrl($subUrl=null)
    {
        $url = "http://localhost/cybercom/cybercom/";
        if($subUrl)
        {
            $url .= $subUrl;
        }
        return $url;
       
    }
}
 ?>