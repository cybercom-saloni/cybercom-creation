<?Php
require 'databaseconnection.php';
require 'login-currentfilename.php';
session_start();
echo $current_file;
if(isset($_POST['submit'])){
	if(isset($_POST['username']) && isset($_POST['password'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			if(strlen($_POST['username'])>10){
				echo "MAX LENGTH IS 10";
			}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="login-logout.php">LOGOUT</a>
</body>
</html>
<?php
				$username=$_POST['username'];
				$password=md5($_POST['password']);
				// echo $username.$password;
				$query="SELECT * FROM `form1_table` WHERE name='".$username."' AND password='".$password."'";
				// echo $query;
				$rs=mysqli_query($connection,$query);
				if(mysqli_num_rows($rs)>0){
					while($row=mysqli_fetch_assoc($rs)){
						$id=$row['id'];
						$_SESSION['username']=$username;
						echo "<br>".$_SESSION['username'];
						echo "<br>".$id."<br><br>";
					}
				}
			}
		}else{
			header("location:login-form.php");
		}
	}else{
		header("location:login-form.php");	
	}
}else{
	header("location:login-form.php");
}
?>
