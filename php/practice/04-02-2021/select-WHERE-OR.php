<?php
require 'databaseconnection.php';
// select form food where status=0 or calories=1000
$query="SELECT * FROM `food` WHERE `status`=0 OR `calories`=1000";
$rs=mysqli_query($connection,$query);
if(mysqli_num_rows($rs)>0){
	while($row=mysqli_fetch_assoc($rs)){
			$id=$row['id'];
			$name=$row['name'];
			$calories=$row['calories'];
			$status=$row['status'];
			echo $id."<b> ".$name." </b> has ".$calories." calories and it is <b>unhealthy food</b>.<br>";
	}
}
?>