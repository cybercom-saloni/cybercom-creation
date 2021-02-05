<?php
require 'databaseconnection.php';
if(isset($_POST['submit-search'])){
	if(!empty($_POST['search'])){
		if(strlen($_POST['search'])>=2){
			$search=$_POST['search'];
			$query="SELECT`name` FROM `pet_people` WHERE `name` LIKE '%".mysqli_real_escape_string($connection,$search)."%'";
			// echo $query;
			$rs=mysqli_query($connection,$query);
			if(mysqli_num_rows($rs)>0){
				echo "<br>".mysqli_num_rows($rs)." result found<br>";
				while($row=mysqli_fetch_assoc($rs)){
					$name=$row['name'];
					echo $name."<BR>";
				}
			}else
			{
				echo "NO RECORD FOUND*****";
			}
		}else{
			header("location:search-form.php");
		}
	}else{
		header("location:search-form.php");
	}
}else
{
	header("location:search-form.php");
}
?>