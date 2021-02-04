<?php
require 'databaseconnection.php';
// var_dump($_GET);
if(isset($_GET['submit'])){
	if(isset($_GET['food']) && !empty($_GET['food'])){
		$food=strtolower($_GET['food']);
		if($food == '1' || $food == '2'){
			if($food == '2'){
				$food_value='0';
			}else{
				$food_value='1';
			}

			$query="SELECT * FROM `food` WHERE `status`=$food_value";
			$rs=mysqli_query($connection,$query);
			// echo $query;
			if(mysqli_num_rows($rs)>0){
				while($row=mysqli_fetch_assoc($rs)){
					$id=$row['id'];
					$name=$row['name'];
					$calories=$row['calories'];
					$status=$row['status'];
						if($status==0){
							echo "<br>".$id."<b> ".$name." </b> has ".$calories." calories and it is <b>unhealthy food</b>.<br>";
						}else{
							echo "<br>".$id." <b>".$name." </b> has ".$calories." calories and it is <b>healthy food</b>.<br>";
						}
				}
			}
		}
	}else{
		header("location:select-based_on_user_type.php?msg=undefinedfood");
	}
}else{
	header("location:select-based_on_user_type.php?msg=submitnotclick");
}
// Select query in form WHERE based on food type it display the details of food.

?>