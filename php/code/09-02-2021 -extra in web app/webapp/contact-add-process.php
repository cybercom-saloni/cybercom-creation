<?php
require 'connection/databaseconnection.php';
require 'fileupload.php';
var_dump($_POST);
var_dump($_FILES);
$name=htmlentities($_POST['name']);
$email=htmlentities($_POST['email']);
$mobileno=htmlentities($_POST['mobileno']);
$employee=htmlentities($_POST['employee']);
$file=$_FILES["filetoupload"]["name"]; 
$created=$_POST['created'];	
echo $file;
// echo $_SERVER["REQUEST_METHOD"];
$datecreated=date('Y-m-d\TH:i:s',strtotime($created));
// var_dump($_POST);
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobileno']) && isset($_POST['employee']) && isset($_POST['created']) && isset($_FILES["filetoupload"]["name"])){
			if(!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['mobileno']) && !empty($_POST['employee']) && !empty($_FILES["filetoupload"]["name"])){
				if (!preg_match ("/^[a-zA-z]*$/", $name) ) {
					$ErrMsg = "Only alphabets and whitespace are allowed."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					header("location:contact-add.php");
				}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$ErrMsg = "Email is invalid."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					header("location:contact-add.php");
				}elseif(!preg_match('/^[6-9][0-9]{9}$/', $mobileno)){
								// $ErrMsg = ""; 
					echo "<script type='text/javascript'>alert('phone number is invalid.');</script>";
					header("location:contact-add.php");
				}elseif (!preg_match ("/^[a-zA-z]*$/", $employee) ) {
					$ErrMsg = "Only alphabets and whitespace are allowed."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					header("location:contact-add.php");
				}elseif(!$datecreated){
					echo "created";
					$ErrMsg = "DATE TIME FORMATE IS WRONG."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
				}else{
					 	$query_email="SELECT * FROM `webapp` WHERE email='".mysqli_real_escape_string($connection,$email)."'";
					 	$rs_email=mysqli_query($connection,$query_email);
					 	if(mysqli_num_rows($rs_email)>0){
					 		while($row_email=mysqli_fetch_assoc($rs_email)){
					 				$emailnew=$row_email['email'];
					 				echo "email id already exists";
					 		}
					 	}else{
					 		$query="INSERT INTO `webapp`(`name`, `email`, `mobileno`, `title`, `created`,`photo`) VALUES ('".mysqli_real_escape_string($connection,$name)."','".mysqli_real_escape_string($connection,$email)."','".mysqli_real_escape_string($connection,$mobileno)."','".mysqli_real_escape_string($connection,$employee)."','".mysqli_real_escape_string($connection,$created)."','".mysqli_real_escape_string($connection,$target_file)."')";
									echo $query;
							$rs=mysqli_query($connection,$query);
							if($rs){
								echo "query inserted";
								header("location:contact-us.php");
							}else{
								echo "not";
							}
					 	}
					 }
			}else{
				header("location:contact-us.php");
			}
		}else{
				header("location:contact-us.php");
			}
	}else{
				header("location:contact-us.php");
			}
}else{
				header("location:contact-us.php");
			}
?>

