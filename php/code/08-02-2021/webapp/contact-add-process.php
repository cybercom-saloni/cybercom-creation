<?php
require 'databaseconnection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$mobileno=$_POST['mobileno'];
$employee=$_POST['employee'];
$created=$_POST['created'];
// echo $_SERVER["REQUEST_METHOD"];
$datecreated=date('Y-m-d\TH:i:s',strtotime($created));

// var_dump($_POST);
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobileno']) && isset($_POST['employee']) && isset($_POST['created'])){
			if(!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['mobileno']) && !empty($_POST['employee'])){
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
					 	$query="INSERT INTO `webapp`(`name`, `email`, `mobileno`, `title`, `created`) VALUES ('".mysqli_real_escape_string($connection,$name)."','".mysqli_real_escape_string($connection,$email)."','".mysqli_real_escape_string($connection,$mobileno)."','".mysqli_real_escape_string($connection,$employee)."','".mysqli_real_escape_string($connection,$created)."')";
									// echo $query;
						$rs=mysqli_query($connection,$query);
						if($rs){
							echo "query inserted";
							header("location:contact-us.php");
						}else{
							echo "not";
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