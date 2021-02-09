<?php
require 'connection/databaseconnection.php';
session_start();
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['email']) && isset($_POST['password'])){
			if(!empty($_POST['email']) && !empty($_POST['password'])){
				$email=htmlentities($_POST['email']);
				$password=htmlentities(md5($_POST['password']));
				// echo $email.$password;
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$ErrMsg = "Email is invalid."; 
					echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
				}elseif(!preg_match('/(?=.*\d)[0-9A-Za-z!@#$%]{8,12}/', $password)) {
    				$msg= 'the password does not meet the requirements!';
    				echo "<script type='text/javascript'>alert('$msg');</script>";
				}else{
					$query_select="SELECT * FROM  `webapp` WHERE email='".mysqli_real_escape_string($connection,$email)."' AND password='".mysqli_real_escape_string($connection,$password)."'";
					echo $query_select;
					$rs_select=mysqli_query($connection,$query_select);
					if($rs_select){
						if(mysqli_num_rows($rs_select)>0){
							while($row_select=mysqli_fetch_assoc($rs_select	)){
								$id=$row['id'];
								$_SESSION['email']=$email;
								$cookiename="user";
								$cookiepass="password";
						setcookie($cookiename,$email,time()+(60),"/");
						setcookie($cookiepass,$password,time()+(60),"/");
						// setcookie("user",$us,time()+(86400*30),"/");
						echo "cookie set";
							}
						}
					}
				}
				
			}else{

			}
		}else{

		}
	}else{
		echo "not";
	}
}
?>