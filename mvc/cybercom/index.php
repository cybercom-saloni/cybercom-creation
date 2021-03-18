<?php
error_reporting(E_ALL);
class Mage{
	public static function init(){
		self::loadFileByClassName('Controller_Core_Front');
		$front=self::getController('Controller_Core_Front');
		Controller_Core_Front::init();
	}
	public static function getController($className){
		self::loadFileByClassName($className);
		$className=str_replace('_',' ',$className);
		$className=ucwords($className);
		$className=str_replace(' ', '_',$className);
		return new $className();
	}
	public static function getBlock($className){
		self::loadFileByClassName($className);
		$className=str_replace('_',' ',$className);
		$className=ucwords($className);
		$className=str_replace(' ', '_',$className);
		return new $className();
	}
	public static function getModel($className){
		self::loadFileByClassName($className);
		$className=str_replace('_',' ',$className);
		$className=ucwords($className);
		$className=str_replace(' ', '_',$className);
		return new $className();
	}
	public static function loadFileByClassName($className){
		$className=str_replace('_',' ',$className);
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




