<?php
$offset=0;
if(isset($_POST['string']) &&isset($_POST['search']) && isset($_POST['replace'])){
	$string=$_POST['string'];
	$search=$_POST['search'];
	$replace=$_POST['replace'];
	$len=strlen($search);
	// echo $len;
	// echo $string.$search.$replace;
	if(!empty($_POST['string']) && !empty($_POST['search']) && !empty($_POST['replace'])){
		while ($strpos=strpos($string,$search,$offset)) {
		$offset=$strpos + $len;
		$string=substr_replace($string, $replace, $strpos,$len);
	}
		echo $string;
	}
	else{
		echo 'Please fill all the fields***.';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
<form action="findandrepalceapplication.php" method="post">
<label>String:</label>
<textarea name="string" cols="40" rows="10"></textarea><br><br>	
<label>Search:</label>
<input type="text" name="search"><br><br>		
<label>Replace:</label>
<input type="text" name="replace"><br><br>	
<input type="submit" name="submit" value="Find and Replace">
</form>
</body>
</html>