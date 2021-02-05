<?Php
require 'login-currentfilename.php';
echo $current_file;
if(isset($_COOKIE['user'])){
	$user=$_COOKIE['user'];
	$password="";
}else{
	$user="";
	$password="";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="login-form-cookie-process.php" method="POST">
	NAME:<input type="text" name="username" value="<?php echo $user; ?>"><br>
	PASSWORD:<input type="text" name="password" value="<?php echo $password; ?>"><br>
	<input type="checkbox" name="remember" value="1">remember<br>
	<input type="submit" name="submit">
</form>
</body>
</html>