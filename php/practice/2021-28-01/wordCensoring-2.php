<?php
$userinput='';
$find=array('alex','villy','dale');
$replace=array('a***','v*****','d***');	

if(isset($_POST['userinput'])&& !empty($_POST['userinput'])){
		// echo "work";
	 $userinput=$_POST['userinput'];
	 // $userinputlower=strtolower($userinput);	
	echo $userinputnew=str_ireplace($find, $replace, $userinput);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
<hr>	
<form method="post" action="wordCensoring-2.php">
<textarea cols="30" rows="10" name="userinput"><?php echo $userinput; ?>	</textarea>	<br>	
<input type="submit" name="submit">
</form>
</body>
</html>