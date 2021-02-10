<?php
require 'dbconnect.php';
$catid=$_GET['catid'];
$proid=$_GET['proid'];
// echo $catid.$proid;
$qty=5;
$query="SELECT * FROM product where proid=$proid";
echo $query;
$rs=mysqli_query($connection,$query);
if(mysqli_num_rows($rs)>0){
	while($row=mysqli_fetch_assoc($rs)){
		$id1=$row['proid'];
		$price=$row['price'];
		echo $price;
		// $name=$row['name'];
		// echo "id -".$id " name : ".$name;
		// echo "<a href='cart-insert.php?catid=$id&&proid=$id1'>cart</a>";
	}
}
$total=$qty*$price;
echo "<br>".$total;

$query_cart="INSERT INTO `cart`(`id`, `proid`, `catid`, `qty`, `total`) VALUES (2,$proid,$catid,$qty,$total)";
$rs_cart=mysqli_query($connection,$query_cart);
if($rs_cart){
	echo "success";
}else{
	echo "error";
}

?>