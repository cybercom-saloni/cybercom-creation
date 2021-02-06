<?php
$servername='localhost';
$username='root';
$password='';
$database='cybercom_practice';

class ServerException extends Exception{
	public function showSpecific(){
		return 'Error throw on line'.$this->getLine().' in '.$this->getFile();
	}
}
class DatabaseException extends Exception{
	public function showSpecific(){
		return 'Error throw on line'.$this->getLine().' in '.$this->getFile();
	}
}

try{
	if(!$connection=@mysqli_connect($servername,$username,$password)){
		throw new ServerException();
	}elseif(!@mysqli_select_db($connection,$database)){
		throw new DatabaseException();
	}else{
		echo "connected";
	}
}catch(ServerException $e){

	echo $e->showSpecific();

}catch(DatabaseException $e){

	echo $e->showSpecific();
}

?>