<?php
require 'dbconnect.php';
$id=$_GET['id'];
// $query="SELECT * FROM `product` LEFT JOIN `cat` ON `product`.`catid`=`cat`.`catid` ";
// $query="select * from product p inner join cat cc on cc.catid=p.catid  where catid=$id";
$query="SELECT * FROM product p JOIN cat c ON c.catid = p.catid
WHERE c.catid = '$id'";
echo $query;
$rs=mysqli_query($connection,$query);
if(mysqli_num_rows($rs)>0){
	while($row=mysqli_fetch_assoc($rs)){
		$id1=$row['proid'];
		// $name=$row['name'];
		// echo "id -".$id " name : ".$name;
		echo "<a href='cart-insert.php?catid=$id&&proid=$id1'>cart</a>";
	}
}
?>