<?php
require 'dbconnect.php';
$query="SELECT * FROM cat WHERE status=0";
$rs=mysqli_query($connection,$query);
if(mysqli_num_rows($rs)>0){
	while($row=mysqli_fetch_assoc($rs)){
		$id=$row['catid'];
		$name=$row['catname'];
		echo "id -".$id." name : ".$name;
		echo "<a href='product-select.php?id=$id'>product</a>";
	}
}
?>