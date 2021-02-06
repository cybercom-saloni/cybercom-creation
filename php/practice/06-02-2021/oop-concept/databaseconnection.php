<?php
class DatabaseConnection{
	public function __construct($db_host,$db_username,$db_password){
		if(!@$this->Connect($db_host,$db_username,$db_password)){
			echo 'connection failed';
		}else{
			echo 'connected to....'.$db_host;
		}
	}

	public function Connect($db_host,$db_username,$db_password){
		if(!mysqli_connect($db_host,$db_password,$db_password)){
			return false;
		}else{
			return true;
		}
	}
}
$connection=new DatabaseConnection('localhost','root','');
?>