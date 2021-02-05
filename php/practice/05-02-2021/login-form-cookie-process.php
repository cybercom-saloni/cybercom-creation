<?Php
require 'databaseconnection.php';
require 'login-currentfilename.php';
session_start();
echo $current_file;

if(isset($_POST['submit'])){
	if(isset($_POST['username']) && isset($_POST['password'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username=$_POST['username'];
			$password=md5($_POST['password']);
			// echo $username.$password;
			$query="SELECT * FROM `form1_table` WHERE name='".mysqli_real_escape_string($connection,$username)."' AND password='".mysqli_real_escape_string($connection,$password)."'";
			echo $query;
			$rs=mysqli_query($connection,$query);
			if(mysqli_num_rows($rs)>0){
				while($row=mysqli_fetch_assoc($rs)){
					$id=$row['id'];
					$_SESSION['username']=$username;
					// echo "<br>".$_SESSION['username'];
					// echo "<br>".$id;
					if(isset($_POST['remember'])){
						setcookie("user",$username,time()+(86400*30),"/");
						setcookie("password",$password,time()+(86400*30),"/");
						// echo "cookie set";
					}
				}
			}else{
				echo "INVALID USER";
			}

		}else{
			header("location:login-form-cookie.php");
		}
	}else{
		header("location:login-form-cookie.php");	
	}
}else{
	header("location:login-form-cookie.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<H1>WELCOME!!!<?PHP echo $_SESSION['username'];?></H1>
<a href="login-logout.php">LOGOUT</a>
</body>
</html>