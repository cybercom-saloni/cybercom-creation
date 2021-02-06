<?php
require 'database.php';
echo "HELLO";
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$password=$_POST['password'];
echo $firstname.$lastname.$password;
$qry="INSERT INTO reg_table(firstname,lastname,password)VALUES('".$firstname."','".$lastname."','".$password."')";
$rs=mysqli_query($connection,$qry);
if($rs){
	echo "success";
}else{
	echo "not";
}
?>