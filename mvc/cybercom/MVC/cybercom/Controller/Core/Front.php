<?php
class Controller_Core_Front{
	// public static function init() {
	// 	$request = \Mage::getModel("Model\Core\Request");
	// 	$controllerName = ucfirst($request->getControllerName());
	// 	$actionName = $request->getActionName() . "Action";
	// 	$controllerName = self::prepareClass($controllerName, "Controller");
	// 	$controller = \Mage::getController($controllerName);
	// 	$controller->$actionName();
	// }
	public static function init(){
		$request=Mage::getModel('Model_Core_Request');
		$controllerName=ucfirst($request->getControllerName());
		Mage::loadFileByClassName("./controller/".$controllerName);
		$actionName=$request->getActionName()."Action";	
		// $controllerName="Controller_".$controllerName;
		$controllerName = self::prepareClassName($controllerName, "Controller");
		$controller=Mage::getController($controllerName);
	
		$controller->$actionName();
	}
	public static function prepareClassName($key,$nameSpace){
		$className = $nameSpace.' '.$key;
		$className = str_replace('_', ' ', $className);
		$className = ucwords($className);
		$className = str_replace(' ', '_', $className);
		
		return $className;
	}
}
?>