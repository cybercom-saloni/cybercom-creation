<?php
require 'connection/databaseconnection.php';
require 'fileupload.php';
$id=$_GET['id'];
// echo $id;
$name=htmlentities($_POST['name']);
$email=htmlentities($_POST['email']);
$mobileno=htmlentities($_POST['mobileno']);
$employee=htmlentities($_POST['employee']);
$created=$_POST['created'];
$datecreated=date('Y-m-d\TH:i:s',strtotime($created));
if(isset($_POST['submit'])){
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobileno']) && isset($_POST['employee']) && isset($_POST['created'])){
		if(!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['mobileno']) && !empty($_POST['employee'])){
			if (!preg_match ("/^[a-zA-z]*$/", $name) ) {
					$ErrMsg = "Only alphabets and whitespace are allowed."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					// header("location:contact-edit.php");
				}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$ErrMsg = "Email is invalid."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					// header("location:contact-edit.php");
				}elseif(!preg_match('/^[6-9][0-9]{9}$/', $mobileno)){
								// $ErrMsg = ""; 
					echo "<script type='text/javascript'>alert('phone number is invalid.');</script>";
					// header("location:contact-edit.php");
				}elseif (!preg_match ("/^[a-zA-z]*$/", $employee) ) {
					$ErrMsg = "Only alphabets and whitespace are allowed."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					// header("location:contact-edit.php");
				}elseif(!$datecreated){
					echo "created";
					$ErrMsg = "DATE TIME FORMATE IS WRONG."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
				}else{
					
							$query="UPDATE `webapp` SET `name`='".mysqli_real_escape_string($connection,$name)."',`email`='".mysqli_real_escape_string($connection,$email)."',`mobileno`='".mysqli_real_escape_string($connection,$mobileno)."',`title`='".mysqli_real_escape_string($connection,$employee)."',`created`='".mysqli_real_escape_string($connection,$created)."',`photo`='".mysqli_real_escape_string($connection,$target_file)."' WHERE `id`='".mysqli_real_escape_string($connection,$id)."'";
							// echo $query;
							// exit();
							$rs=mysqli_query($connection,$query);
							if($rs){
								echo "success";
								header("location:contact-us.php");
							}else{
								echo "not";
							}
						  
				}
		}
	}
}
?>