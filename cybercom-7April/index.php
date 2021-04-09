<?php
spl_autoload_register(__NAMESPACE__.'\Mage::loadFileByClassName');
class Mage{
	public static function init(){
		$front=self::getController('Core\Front');
		\Controller\Core\Front::init();
	}
	public static function getController($controllerName){
		$controllerName='Controller\\'.$controllerName;
		$controllerName=str_replace('\\',' ',$controllerName);
		$controllerName=ucwords($controllerName);
		$controllerName=str_replace(' ', '\\',$controllerName);
		return new $controllerName();
	}
	public static function getBlock($blockName){
		$blockName='Block\\'.$blockName;
		$blockName=str_replace('\\',' ',$blockName);
		$blockName=ucwords($blockName);
		$blockName=str_replace(' ', '\\',$blockName);
		return new $blockName();
	}
	public static function getModel($modelName){
		$modelName='Model\\'.$modelName;
		$modelName=str_replace('\\',' ',$modelName);
		$modelName=ucwords($modelName);
		$modelName=str_replace(' ', '\\',$modelName);
		return new $modelName();
	}
	public static function loadFileByClassName($className){
		$className=str_replace('\\',' ',$className);
		$className=ucwords($className);
		$className=str_replace(' ', '/',$className);
		$className.=".php";
		require_once ("./".$className);
	}

	public static function getBaseDir($subPath = null)
    {
        if ($subPath) {
            return getcwd().DIRECTORY_SEPARATOR.$subPath; 
        }
        return getcwd();
    }
}

Mage::init();	
?>




