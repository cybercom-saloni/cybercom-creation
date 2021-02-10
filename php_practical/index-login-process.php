<?php
require 'connection/databaseconnection.php';
session_start();
$email=htmlentities($_POST['email']);
$password=htmlentities(md5($_POST['password']));
$date=date("y-m-d h:m:s");
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($email) && isset($password)){
			if(!empty($email) && !empty($password)){
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$ErrMsg = "Email is invalid."; 
					 echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					 header("refresh:0; url=index.php");
				}elseif(!preg_match('/[0-9A-Za-z!@#$%]{8,12}/', $password)){
						echo "<script type='text/javascript'>alert('Password is invalid.');</script>";
						header("refresh:0; url=index.php");
				}else{
					$query_login="SELECT * FROM `register` WHERE email='".mysqli_real_escape_string($connection,$email)."' AND password='".mysqli_real_escape_string($connection,$password)."' AND status=1";
					$rs=mysqli_query($connection,$query_login);
					if(mysqli_num_rows($rs)>0){
						while($row_login=mysqli_fetch_assoc($rs)){
							$_SESSION['email']=$email;
							$id=$row_login['id'];
							$_SESSION['id']=$id;
							$firstname=$row_login['firstname'];
							$_SESSION['firstname']=$firstname;
							if(isset($_POST['remember'])){
								$cookiename="user";
								$cookiepass="password";
								setcookie($cookiename,$username,time()+((86400*30)),"/");
								setcookie($cookiepass,$password,time()+((86400*30)),"/");
							}
						$query_update="	UPDATE `register` SET `last_login_at`='".$date."' WHERE id='".mysqli_real_escape_string($connection,$id)."'";
						$rs_update=mysqli_query($connection,$query_update);
						if($rs_update){
							echo "<script type='text/javascript'>alert('login successfull!!!');</script>";
						 	header("refresh:0; url=blog-post.php?msg=true");
					 	}else{
					 		echo "not";
					 	}
						}
					}else
					{
						echo "<script type='text/javascript'>alert('invalid login!!!');</script>";
					 header("refresh:0; url=index.php");
					}
				}
			}else{
				header("refresh:0; url=index.php");
			}

		}else{
			header("refresh:0; url=index.php");
		}
	}else{
		header("refresh:0; url=index.php");
	}
}else{
	header("refresh:0; url=index.php");
}
?>