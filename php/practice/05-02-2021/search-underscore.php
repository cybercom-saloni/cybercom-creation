<?php
require 'databaseconnection.php';
$query="SELECT `name` FROM `pet_people` WHERE `name` LIKE '__loni'";
$rs=mysqli_query($connection,$query);
echo $query;
if($rs){
	echo "yes";
}else{
	echo "no";
}
?>