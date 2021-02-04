<?php
require 'databaseconnection.php';
$query="SELECT `pet_people`.`name`,`pet`.`pet` FROM `pet` JOIN `pet_people` ON `pet`.`peopleid`=`pet_people`.`pid`";
echo $query;
$rs=mysqli_query($connection,$query);
if($rs){
	echo "success";
}
?>