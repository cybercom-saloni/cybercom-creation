<?php
$servername='localhost';
$username='root';
$password='';
$database='cybercom_practice';

class ServerException extends Exception{}
class DatabaseException extends Exception{}

try{
	if(!$connection=@mysqli_connect($servername,$username,$password)){
		throw new ServerException('Could not connect to server');
	}elseif(!@mysqli_select_db($connection,$database)){
		throw new DatabaseException('Could not select Database');
	}else{
		echo "connected";
	}
}catch(ServerException $e){

	echo 'Error'.$e->getMessage();

}catch(DatabaseException $e){

	echo 'Error'.$e->getMessage();
}

?>