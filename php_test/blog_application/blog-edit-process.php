<?php
require 'connection/databaseconnection.php';
// var_dump($_POST);
$id=$_GET['id'];
$prefix=$_POST['prefix'];
$firstname=htmlentities($_POST['firstname']);
$lastname=htmlentities($_POST['lastname']);	
$email=htmlentities($_POST['email']);
$password=htmlentities(md5($_POST['password']));
$confirmpassword=htmlentities(md5($_POST['confirmpassword']));
$mobileno=htmlentities($_POST['mobileno']);
$information=htmlentities($_POST['information']);
$date=date("y-m-d h:m:s");
// echo $date;
// exit();
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['accept'])){
			if(isset($prefix) && isset($firstname) && isset($lastname) && isset($email) && isset($password) && isset($confirmpassword) && isset($mobileno) && isset($information)){
				if(!empty($prefix) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmpassword) && !empty($mobileno) && !empty($information)){
					if (!preg_match ("/^[a-zA-z]*$/", $firstname) ) {
					$ErrMsg = "Only alphabets and whitespace are allowed."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					header("refresh:0; url=blog-edit.php");
					}elseif (!preg_match ("/^[a-zA-z]*$/", $lastname) ) {
					$ErrMsg = "Only alphabets and whitespace are allowed in last name."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					header("refresh:0; url=blog-edit.php");
					}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$ErrMsg = "Email is invalid."; 
					 echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					 header("refresh:0; url=blog-edit.php");
					}elseif(!preg_match('/[0-9A-Za-z!@#$%]{8,12}/', $password)){
						echo "<script type='text/javascript'>alert('Password is invalid.');</script>";
						header("refresh:0; url=blog-edit.php");
					}elseif(!preg_match('/[0-9A-Za-z!@#$%]{8,12}/', $confirmpassword)){
						echo "<script type='text/javascript'>alert('Password is invalid.');</script>";
						header("refresh:0; url=blog-edit.php");
					}elseif($password!=$confirmpassword){
						echo "<script type='text/javascript'>alert('Password is not match.');</script>";
						header("refresh:0; url=blog-edit.php");
					}elseif(!preg_match('/^[6-9][0-9]{9}$/', $mobileno)){
						echo "<script type='text/javascript'>alert('phone number is invalid.');</script>";
						header("refresh:0; url=blog-edit.php");
					}else{
						
							
							$query="UPDATE `register` SET `prefix`='".mysqli_real_escape_string($connection,$prefix)."',`firstname`='".mysqli_real_escape_string($connection,$firstname)."',`lastname`='".mysqli_real_escape_string($connection,$lastname)."',`mobile`='".mysqli_real_escape_string($connection,$mobileno)."',`password`='".mysqli_real_escape_string($connection,$password)."',`information`='".mysqli_real_escape_string($connection,$information)."',`updated_at`='".$date."' WHERE `id`='".mysqli_real_escape_string($connection,$id)."'";
							echo $query;
							$rs=mysqli_query($connection,$query);
							if($rs){
								
								echo "<script type='text/javascript'>alert('Profile edited');</script>";
								header("refresh:0; url=blog-post.php?msg=true");
							}else{
								echo "not";
							}
							
					}
				}else{
					header("refresh:0; url=blog-edit.php");
				}
					
			}else{
					header("refresh:0; url=blog-edit.php");
			}
		}else{
		header("refresh:0; url=blog-edit.php");
		}
	}else{
	header("refresh:0; url=blog-edit.php");
	}
}else{
	header("refresh:0; url=blog-edit.php");
}
?>
