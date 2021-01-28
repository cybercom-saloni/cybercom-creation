<?php
if(isset($_GET['name']) && !empty($_GET['name'])){
	$username = $_GET['name'];
	$user_namelc=strtolower(	$username);
	if($user_namelc==='saloni')	{
		echo "nice day!!!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
<form method="get">	
<input type="text" name="name"><br>	
<input type="submit" name="submit">
</form>
</body>
</html>