<?php
$servername="localhost";
$username="root";
$password="";
$databasename="cybercom_practice";

// create connection
$connection=mysqli_connect($servername,$username,$password);

// check connection
if(!$connection){
	die("connection failed".mysql_connect_error());
}
echo "connected successfully";

// connection with database
$database=mysqli_select_db($connection,$databasename);

if($database){
	echo "database selected<br>";
}else{
	echo "database not selected";
}
?>