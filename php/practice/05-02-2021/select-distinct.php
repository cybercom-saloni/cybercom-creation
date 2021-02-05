<?php
require 'databaseconnection.php';
$query="SELECT DISTINCT `name` FROM `pet_people`";
$rs=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($rs)){
	echo $row['name']."<br>";
}
?>