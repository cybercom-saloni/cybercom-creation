<?php
class ConstructorDemo{
	public function __construct(){
		$this->Saysomething();
	}
	public function Saysomething(){
		echo 'something';
	}
}

$example=new ConstructorDemo;
?>