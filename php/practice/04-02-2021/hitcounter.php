<?php
require 'databaseconnection.php';
$user_ip=$_SERVER['REMOTE_ADDR'];
function ip_exists($ip){
	global $user_ip;
	$query="SELECT ip_address FROM ip_address WHERE ip_address='$user_ip'";
	// echo $query;
	global $connection;
	$rs=mysqli_query($connection,$query);
	$rows = mysqli_num_rows($rs);
	// echo $rows;
	if($rows>0){
		die("ip already exits");
		// update_count();
	}else{
		ip_add($user_ip);
		update_count();
	}
}

function ip_add($ip)
{
	$query="INSERT INTO `ip_address` (`ip_address`) VALUES ('$ip')";
	global $connection;
	$rs=mysqli_query($connection,$query);
}

function update_count(){
	$query="SELECT * FROM `hit_count`";
	// echo $query;
	global $connection;
	$rs=mysqli_query($connection,$query);
	if(mysqli_num_rows($rs)>0){
		while($row=mysqli_fetch_assoc($rs)){
			$hitcount=$row['hitcount'];
				// echo $hitcount;
				$count=$hitcount+1;
				// echo $count;
				$query_update="UPDATE `hit_count` SET `hitcount`='$count'";
				// echo $query_update;
				$query_update_run=mysqli_query($connection,$query_update);
		}
	}

}
ip_exists($user_ip);
?>