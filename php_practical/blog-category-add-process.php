<?php
require 'connection/databaseconnection.php';
$title=htmlentities($_POST['title']);
$name=htmlentities($_POST['name']);
$content=htmlentities($_POST['content']);
$url=htmlentities($_POST['url']);
$metatitle=htmlentities($_POST['metatitle']);
$date=date("y-m-d h:m:s");
if(isset($_POST['submit'])){
	if(isset($title) && isset($name) && isset($content) && isset($url) && isset($metatitle)){
		if(!empty($title) && !empty($name) && !empty($content) && !empty($url) && !empty($metatitle)){
		$query_cat="INSERT INTO `category`( `name`, `title`, `meta title`, `url`, `content`, `createdAt`, `updatedAt`, `status`) VALUES ('".mysqli_real_escape_string($connection,$name)."','".mysqli_real_escape_string($connection,$title)."','".mysqli_real_escape_string($connection,$metatitle)."','".mysqli_real_escape_string($connection,$url)."','".mysqli_real_escape_string($connection,$content)."','".$date."','".$date."',1)";
		$rs=mysqli_query($connection,$query);
		if($rs){
			echo "success";
		}else{
			echo "error";
		}
	}
	}
}
?>