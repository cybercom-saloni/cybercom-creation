<?php
require 'databaseconnection.php';
$query="SELECT * FROM `food` ORDER BY `id` DESC ";
$rs=mysqli_query($connection,$query);
if(mysqli_num_rows($rs)>0){
		while($row=mysqli_fetch_assoc($rs)){
			$id=$row['id'];
			$name=$row['name'];
			$calories=$row['calories'];
			$status=$row['status'];
			if($status==0){
				echo $id."<b> ".$name." </b> has ".$calories." calories and it is <b>unhealthy food</b>.<br>";
			}else{
				echo $id." <b>".$name." </b> has ".$calories." calories and it is <b>healthy food</b>.<br>";
			}
		}
	}
?>