<?php
class ConstructorDemo{
	public function __construct($something){
		$this->Saysomething($something);
	}
	public function Saysomething($something){
		echo $something;
	}
}

$example=new ConstructorDemo("HELLO");
?>