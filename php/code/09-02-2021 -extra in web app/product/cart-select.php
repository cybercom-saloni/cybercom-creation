<?php
require 'dbconnect.php';
$query=" select * from cart c inner join product p on p.proid = c.proid
 inner join cat cat on cat.catid = p.catid where c.id=2";
 echo $query;
 $rs=mysqli_query($connection,$query);
 if($rs){
 	echo "success";
 }else{
 	echo "error";
 }
?>