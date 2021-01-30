<?php
if(isset($_POST['user_password']) && !empty($_POST['user_password'])){
	// echo "yes";
	$user_password=md5($_POST['user_password']);
	$filename='md5-hash.txt';
	$handle=fopen($filename,'r');
	$file_password=fread($handle,filesize($filename));
	if($user_password==$file_password){
		echo "password correct!!!!";
	}else{
		echo "password incorrect!!!";
	}

}else{
	echo "please enter password****";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="md5-encryption-form.php">
	<label>Password</label><br>
	<input type="text" name="user_password"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>