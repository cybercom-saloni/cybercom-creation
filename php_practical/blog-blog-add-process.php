<?php
session_start();
require 'connection/databaseconnection.php';
require 'file-upload.php';
$id=$_SESSION['id'];
// echo $id;
$title=htmlentities($_POST['title']);
$content=htmlentities($_POST['content']);
$url=htmlentities($_POST['url']);
$metatitle=htmlentities($_POST['metatitle']);
$date=date("y-m-d h:m:s");
$file=$_FILES["filetoupload"]["name"]; 
if(isset($_POST['submit'])){
	if(isset($title)  && isset($content) && isset($url) && isset($metatitle) && isset($file)){
		if(!empty($title)  && !empty($content) && !empty($url) && !empty($metatitle) && !empty($file)){
			$query_cat="INSERT INTO `blog_post`(`userid`, `title`, `url`, `content`, `image`, `publishAt`, `createdAt`, `updatedAt`) VALUES ('".mysqli_real_escape_string($connection,$id)."','".mysqli_real_escape_string($connection,$title)."','".mysqli_real_escape_string($connection,$url)."','".mysqli_real_escape_string($connection,$content)."','".mysqli_real_escape_string($connection,$target_file)."','".$date."','".$date."','".$date."')";
			echo $query_cat;
			
		$rs=mysqli_query($connection,$query_cat);
		if($rs){
			echo "success";
			header("location:blog-category.php?msg=true");
		}else{
			echo "error";
		}
	}
	}
}
?>